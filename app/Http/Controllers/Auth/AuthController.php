<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\UserDetail;
use App\UserRegistration;
use App\UserAccountStatus;
use App\UserLogin;
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|numeric',
            'postalcode' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'birthdate' => 'required|date',
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'account_status' => 'registered',
        ]);

        UserDetail::create([
            'user_id' => $user->user_id,
            'phone' => $data['phone'],
            'postalcode' => $data['postalcode'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'city' => $data['city'],
            'birthdate' => $data['birthdate'],
        ]);

        UserRegistration::create([
            'user_id' => $user->user_id,
        ]);

        UserAccountStatus::create([
            'user_id' => $user->user_id,
            'account_status' => 'registered',
        ]);

        UserLogin::create([
            'user_id' => $user->user_id,
            'login_ip' => \Request::ip(),
        ]);

        return $user;
    }

//// TODO: not tested
    /**
     * Handlecan authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'account_status' => 'verified'])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
