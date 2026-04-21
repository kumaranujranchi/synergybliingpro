<?php

namespace Crater\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HybridTenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $baseDomain = config('app.url'); // e.g., http://localhost:8000
        $parsedUrl = parse_url($baseDomain);
        $masterHost = $parsedUrl['host'] ?? 'localhost';

        // 1. Skip if we are on the master host
        if ($host === $masterHost) {
            return $next($request);
        }

        // 2. Identify Tenant from subdomain
        $subdomain = explode('.', $host)[0];
        $tenant = \Crater\Models\Tenant::where('subdomain', $subdomain)->first();

        if (!$tenant) {
            return $request->expectsJson() 
                ? response()->json(['error' => 'Tenant not found.'], 404)
                : response('Tenant not found.', 404);
        }

        // 3. Check Subscription Status
        if (!$tenant->is_active || ($tenant->subscription_ends_at && $tenant->subscription_ends_at->isPast())) {
            return $request->expectsJson()
                ? response()->json(['error' => 'Subscription expired or account suspended.'], 403)
                : response()->view('errors.403');
        }

        // 4. Swap Database Connection
        $this->switchDatabase($tenant);

        return $next($request);
    }

    /**
     * Dynamically switches the default MySQL connection to the tenant's remote database.
     */
    protected function switchDatabase($tenant)
    {
        $password = decrypt($tenant->db_password);

        config([
            'database.connections.mysql.host'     => $tenant->db_host,
            'database.connections.mysql.database' => $tenant->db_name,
            'database.connections.mysql.username' => $tenant->db_username,
            'database.connections.mysql.password' => $password,
        ]);

        \DB::purge('mysql');
        \DB::reconnect('mysql');
    }
}
