<?php 

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\bienvenidaEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
            
            'usu_sex' => 'required|integer|max:255',
            'usu_age' => 'required|integer|max:255',
            'usu_occupation' => 'required|string|max:255',
            'usu_address' => 'required|string|max:255',
            'usu_city' => 'required|string|max:255',
            'usu_state' => 'required|string|max:255',
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
        $hoy = getdate();
        $fecha = $hoy['month'].' '.$hoy['year'];
        $password = str_random(6);   
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($password),

            'usu_sex' => $data['usu_sex'],
            'usu_age' => $data['usu_age'],
            'usu_occupation' => $data['usu_occupation'],
            'usu_address' => $data['usu_address'],
            'usu_city' => $data['usu_city'],
            'usu_state' => $data['usu_state'],
            'usu_type' => 0,

        ]);
        
        Mail::to($data['email'],$data['name'])
        ->send(new bienvenidaEmail($data['name'],$password,$data['email'],$fecha));

        flash('!Usuario registrado, revisa¡')->success();

        return $user;
    }
}
