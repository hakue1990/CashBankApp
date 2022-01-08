<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     *
     */
    // ----------------- Był kłopot z pobieraniem ID Usera po usunięciu jakiegos z BD. Poniżej jest to poprawione
//    protected function create(array $data)
//    {
//        $id = DB::table('users')->max('id');
//        $id_usera = $id +1;
//        $chars = "1234567890";
//        $len = strlen($chars) - 1;
//        $output='';
//        for($i =0; $i < 26; $i++)
//        {
//            $random = rand(0, $len);
//            $output .=  $chars[$random];
//        }
//
//            Account::create([
//            'id_user' => $id_usera,
//            'account_number' => $output,
//            'type'=>'regular account',
//            'balance' => 5
//        ]);
//        return User::create([
//            'id' => $id_usera,
//            'name' => $data['name'],
//            'surname' => $data['surname'],
//            'PESEL' => $data['PESEL'],
//            'email' => $data['email'],
//            'phone_number' => $data['phone'],
//            'password' => Hash::make($data['password']),
//        ]);
//
//    }

    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->PESEL = $data['PESEL'];
        $user->email = $data['email'];
        $user->phone_number = $data['phone'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $id = User::select(['id'])->where('PESEL', $data['PESEL'] )->get();

        $chars = "1234567890";
        $len = strlen($chars) - 1;
        $output='';
        for($i =0; $i < 26; $i++)
        {
            $random = rand(0, $len);
            $output .=  $chars[$random];
        }

        Account::create([
            'id_user' => $id[0]['id'],
            'account_number' => $output,
            'type'=>'regular account',
            'balance' => 5
        ]);

        return $user;
    }

}
