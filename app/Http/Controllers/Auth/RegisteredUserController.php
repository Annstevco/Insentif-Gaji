<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect; // Only this import is necessary for redirection

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'division' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = $this->assignRoleBasedOnNIP($request->nip);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip, // Ensure this line is correctly getting the NIP from the request
            'division' => $request->division,
            'password' => Hash::make($request->password),
            'role' => $role, // Assigning role based on NIP
        ]);

        event(new Registered($user));

        // Comment this line if you want users to manually login after registering
        // Auth::login($user);

        return Redirect::route('login')->with('success', 'Registration successful, you can now login!');
    }

    protected function assignRoleBasedOnNIP($nip)
    {
        if (preg_match('/^101\d{2}\d{2}\d{4}[1-9]$/', $nip)) {
            return 'admin';
        }

        return 'user';
    }
}
