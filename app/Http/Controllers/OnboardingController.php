<?php

namespace Crater\Http\Controllers;

use Crater\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OnboardingController extends Controller
{
    public function show()
    {
        return view('onboard');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|alpha_dash|unique:master.tenants,subdomain',
            'db_host' => 'required|string',
            'db_name' => 'required|string',
            'db_username' => 'required|string',
            'db_password' => 'required|string',
            'order_id' => 'nullable|string|max:100',
        ]);

        // Attempt to verify DB connection before saving
        try {
            $config = config('database.connections.mysql');
            $config['host'] = $request->db_host;
            $config['database'] = $request->db_name;
            $config['username'] = $request->db_username;
            $config['password'] = $request->db_password;

            config(['database.connections.tenant_test' => $config]);
            DB::connection('tenant_test')->getPdo();
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['db_connection' => 'Could not connect to your Hostinger database. Please check your credentials and make sure you have allowed Remote MySQL for our IP. Error: ' . $e->getMessage()]);
        }

        // Save new tenant to master database
        try {
            $tenant = new Tenant();
            $tenant->setConnection('master'); // Ensure we save to master
            $tenant->name = $request->name;
            $tenant->subdomain = $request->subdomain;
            $tenant->db_host = $request->db_host;
            $tenant->db_name = $request->db_name;
            $tenant->db_username = $request->db_username;
            $tenant->db_password = Crypt::encryptString($request->db_password);
            $tenant->subscription_ends_at = now()->addYear();
            $tenant->order_id = $request->order_id;
            
            // If they provided an Order ID, we keep them inactive for verification
            $tenant->is_active = $request->order_id ? false : true; 
            
            $tenant->save();

            if ($request->order_id) {
                Log::info("NEW REFERRAL CLAIM: Tenant {$request->name} (Subdomain: {$request->subdomain}) claims Hostinger Email: {$request->order_id}. Please verify in Hostinger Panel.");
                return redirect('/onboard')->with('success_pending', 'Hooray! We have received your request. Our team is verifying your Hostinger Email Address. Your billing dashboard will be activated within 4-6 hours once verified.');
            }

            $domain = parse_url(config('app.url'), PHP_URL_HOST);
            $newUrl = "http://{$request->subdomain}.{$domain}";

            return redirect($newUrl . '/login')->with('success', 'Your billing platform is ready! Please login with your credentials.');

        } catch (\Exception $e) {
            Log::error("Onboarding failed: " . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Something went wrong. Please try again later.']);
        }
    }
}
