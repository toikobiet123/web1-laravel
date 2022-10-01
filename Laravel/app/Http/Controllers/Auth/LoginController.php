<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            return \redirect('admin/dashboard')->with('message','chào mừng bạn');
        }else{
            return \redirect('/')->with('status','đăng nhập thành công');
        }
    }
    public function getLoginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();
        if ($googleUser) {
            $user = User::where('email',$googleUser->getEmail())->first();
            if($user){
                Auth::login($user);
                return \redirect()->route('home');
            }else{
                return \view('auth.google',\compact('googleUser'));
            }

        }
    }
    public function saveGoogle(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ],[
            'password.required' => 'Mật khẩu không thể để trống',
            'password.confirmed' => 'Nhập lại mật khẩu nhập không đúng'

        ]);
        if ($request->password_confirmation == $request->password) {
            $newUser = new User;
            // $newUser->fill($request->all());
            $newUser->name = $request->name;
            $newUser->provider_name = 'google';
            $newUser->email = $request->email;
            $newUser->email_verified_at = now();
            $newUser->role_as = 0;
            $newUser->avatar = $request->avatar;
            $newUser->password = Hash::make($request->password);
            // \dd($newUser);
            $newUser->save();
            Auth::login($newUser);
            return \redirect()->route('home');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
