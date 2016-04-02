<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use App\Models\Providers_User;

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        //return 'came';
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect("/");
        }
        //return dd($user);
        $authUser = $this->findOrCreateUser($user,$provider);

        Auth::login($authUser, true);

        return redirect('info');

    }
    public function findOrCreateUser($user,$provider){
        $checkuser=Providers_User::where('provider_user_id',$user->getId())->where('provider_name',$provider)->first();
        if($checkuser){
            return User::where('id',$checkuser->user_id)->first();
        }
        else {
            $users=new User();
        $users->email = $user->getEmail();
        $users->name = $user->getName();
            $users->avatar=$user->getAvatar();
        $users->save();
            $providersUsers=new Providers_User();
        $providersUsers->provider_name = $provider;
        $providersUsers->provider_user_id = $user->getId();
        $providersUsers->user_id = $users->id;
        $providersUsers->save();
        Auth::loginUsingId($users->id);

    }
}
}
