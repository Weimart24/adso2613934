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
            'fullname' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'file'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        if ($request->hasFile('photo')) {
            // Almacena el archivo en el sistema de archivos y obtiene solo el nombre hash del archivo.
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();
            // Almacena el archivo en la ubicación especificada.
           $destinoPath = public_path('/images/userProfile');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = 'no-photo.jpg';
        }

        $user = User::create([
            'fullname' => $request->fullname,
            'document' => $request->document,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'photo' => $photoName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
