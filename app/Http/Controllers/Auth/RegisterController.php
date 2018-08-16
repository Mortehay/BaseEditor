<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserRoles;
use DB;
use Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/you-registred';
    protected $data = [];

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(Schema::hasTable('user_roles') && Schema::hasTable('users')){
            $admin_tokens = DB::table('user_roles')
                ->join('users','user_roles.u_id', '=', 'users.id')
                ->select('users.user_token','users.email')
                ->where('user_roles.role',  'admin')
                ->get();
        }
        foreach($admin_tokens as $token){
            mail($token->email, 'add access new user', 'click on url to enable new user with email - '.$data['email'].'  '. url('/api/adduser/'.$token->user_token.'/'. $data['email']) . '');
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }



    protected function addUser($token, $email)
    {
        if(Schema::hasTable('user_roles') && Schema::hasTable('users') && User::where('user_token',$token)->first() !== null ){
            User::where('email',$email)->update(['active_token' => 'active', 'user_token'=>str_random(60)]);
            $user_id = User::where('email', $email)->first()->id;
            UserRoles::create([
                'u_id'=>$user_id,
            ]);
        }
        return view('auth.thanks');

    }
}
