<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'role' => $request->role,
            'email' => $request->nip.'@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        event(new Registered($user));

        return redirect()->route('direktur.datakaryawan')->with('success', 'berhasil');
    }
}
