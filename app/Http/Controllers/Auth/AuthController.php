<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------ß
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
        $this->middleware('guest', ['except' => 'logout']);
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
            'facebook_id' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     */
    public function redirectToProvider()
    {
        $scopes = [
            'user_friends'
        ];
        if(Input::has('developer')){
            $scopes[] = 'publish_actions';
        }
        return Socialite::driver('facebook')->scopes($scopes)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     */
    public function handleProviderCallback()
    {
        if (Auth::check())
        {
            Redirect::to('/');
        }
        $defaultData = [

        ];
        try{
            $fbUser = Socialite::driver('facebook')->user();
        }
        catch(Exception $e){
            return $e->getMessage();
        }

        $rawData=array_merge($defaultData, $fbUser->getRaw());

        if(!$rawData['verified'])
        {
            return 'Your account must be verified by facebook to register';
        }
        if(!isset($rawData['email'])){
            return "Your facebook must have email to register.";
        }

        $facebook_id = $rawData['id'];

        $user = User::where('facebook_id', '=', $facebook_id)->first();

        if($user){
            //Update user info
            $isChanged = false;
            if($user->name != $rawData['name']){
                $user->name = $rawData['name'];
                $isChanged = true;
            }
            if($user->email !=  $rawData['email']){
                $user->email =  $rawData['email'];
                $isChanged = true;
            }
            $user->fb_token = $fbUser->token;
            try{
                $user->save();
            }catch(Exception $e){

            }

            Auth::login($user);
            return Redirect::to(route('game.index'));
        }
        else{
            $user = new User();
            $user->fb_token = $fbUser->token;
            $user->name = $rawData['name'];
            $user->email =  $rawData['email'];
            $user->facebook_id = $facebook_id;
            $password = Str::random(16);
            $user->password = bcrypt($password);
            try{
                $role = Role::where('name','=','member')->firstOrFail();
                $user->save();
                $user->roles()->save($role);
                Auth::login($user);

                Mail::send('emails.welcome', ['user' => $user, 'password' => $password], function ($m) use ($user) {
                    $m->from('cs@senviet.org', 'CS4VN');
                    $m->to($user->email, $user->name)->subject('Mật Khẩu CS4VN');
                });

            }
            catch(Exception $e){
                return $e->getMessage();
            }
            return Redirect::to('/')->withSuccess(['success'=>'Login success!']);
        }
    }
}
