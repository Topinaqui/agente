<?php

namespace App\Http\Controllers\Auth;

use App\Agente;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * For custom classe...
     * @param  array  $data
     * @return Agente
     */
    protected function create(array $data)
    {
        return Agente::create([
            'name' => $data['name'],
            'senha' => bcrypt($data['password']),
            ]);
    }
}
