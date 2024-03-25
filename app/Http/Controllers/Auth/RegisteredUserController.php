<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voluntario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]); 

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'municipio_id'=>5
        ]);

         if( $request->user_name == "voluntario"){
            $voluntario = Voluntario::create([
                'data_nascimento'=>$request->data_nascimento,
                'endereço'=>$request->endereço,
                'is_trabalhador'=>$request->is_trabalhador,
                'profissao'=>$request->profissao,
                'area_de_interesse'=>$request->area_de_interesse,
                'sobre'=>$request->sobre,
                'user_id'=> $user->id
            ]);
            $user->assignRole(3);
        } 

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
