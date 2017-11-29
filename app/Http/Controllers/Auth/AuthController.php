<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Krucas\LaravelUserEmailVerification\AuthenticatesAndRegistersUsers as VerificationAuthenticatesAndRegistersUsers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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

 use AuthenticatesAndRegistersUsers, ThrottlesLogins, VerificationAuthenticatesAndRegistersUsers {
        AuthenticatesAndRegistersUsers::redirectPath insteadof VerificationAuthenticatesAndRegistersUsers;
        AuthenticatesAndRegistersUsers::getGuard insteadof VerificationAuthenticatesAndRegistersUsers;
        VerificationAuthenticatesAndRegistersUsers::register insteadof AuthenticatesAndRegistersUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
           'first_name' => 'required|max:255',

             'middle_name' => 'max:255',
             'last_name' => 'required|max:255',
              'phone_number' => 'required|max:255',
              'country' => 'required|max:255',
            'city' => 'required|max:255',
             'address' => 'max:255',
             'profession' => 'max:255',
             'id_number' => 'required|max:255',
            
              
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {    
        $first=ucfirst(substr($data['first_name'],0,1));
        $last=ucfirst(substr($data['last_name'],0,1));
        $country=ucfirst(substr($data['country'],0,1));
        $city=ucfirst(substr($data['city'],0,1));
         $users = User::all();
        $count = count( $users) + 1;
        $usercode=$first.$last.$country.$city.$count;
        return User::create([
            
          
           'first_name' => $data['first_name'],
              'middle_name' => $data['middle_name'],
              'last_name' => $data['last_name'],
              'phone_number' => $data['phone_number'],
              'country' => $data['country'],
              'city' => $data['city'],
              'address' => $data['address'],
               'profession' => $data['profession'],
               'id_number' => $data['id_number'],
               'system_code' => $usercode,
           
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
