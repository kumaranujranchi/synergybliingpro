<?php

namespace Crater\Http\Controllers;

use Crater\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterAdminController extends Controller
{
    public function showLogin()
    {
        return view('master.login');
    }

    public function login(Request $request)
    {
        $password = config('app.master_admin_password', env('MASTER_ADMIN_PASSWORD'));
        
        if ($request->password === $password) {
            session(['master_logged_in' => true]);
            return redirect()->route('master.dashboard');
        }

        return back()->withErrors(['password' => 'Incorrect Master Password.']);
    }

    public function logout()
    {
        session()->forget('master_logged_in');
        return redirect()->route('master.login');
    }

    public function dashboard()
    {
        $tenants = Tenant::on('master')->orderBy('created_at', 'desc')->get();
        return view('master.dashboard', compact('tenants'));
    }

    public function toggleStatus($id)
    {
        $tenant = Tenant::on('master')->findOrFail($id);
        $tenant->is_active = !$tenant->is_active;
        $tenant->save();

        return back()->with('success', "Tenant status updated for {$tenant->name}.");
    }

    public function delete($id)
    {
        $tenant = Tenant::on('master')->findOrFail($id);
        $tenant->delete();

        return back()->with('success', "Tenant {$tenant->name} has been removed from the platform.");
    }
}
