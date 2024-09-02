<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('nip', 'password'))) {
            // Get the logged-in user
            $user = Auth::user();

            // Assign role based on NIP
            $role = $this->assignRoleBasedOnNIP($user->nip);

            if ($role == 'admin') {
                return redirect()->route('admin-page'); // Assuming you have an 'admin-page' named route.
            }

            return redirect()->route('dashboard'); // For non-admin users
        }

        return redirect()->route('login')->withErrors(['error' => 'Invalid Credentials']);
    }

    protected function assignRoleBasedOnNIP($nip)
    {
        if (preg_match('/^101\d{2}\d{2}\d{4}[1-9]$/', $nip)) {
            return 'admin';
        }

        return 'user';
    }

    public function destroy(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Redirecting to the login page with a query parameter
        return redirect()->route('login', ['logged_out' => true]);
    }
}
