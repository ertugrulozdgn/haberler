<?php

namespace App\Http\Controllers\Cms\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->flash();

        $credentials = $request->only('email','password');
        $credentials['status'] = 1;
        $remember_token = $request->filled('remember') ? true : false;  //dd() ile kontrol ettiğimizde remembere_token sonucu "on" dönüyor. Bu yüzden bir if koşulu yaptık.

        if (Auth::attempt($credentials,$remember_token)) // attempt veritabanında arar.
        {
            return redirect()->intended(action('Cms\DashboardController@index'));

        } else {
            if($credentials['status'] == 1) {
                return back()->with('error', 'Erişim Yetkiniz Yoktur');
            } else {
                return back()->with('error','Email veya Şifre Hatalı!');
            }
        }
    }

    public function showLoginForm()
    {
    
        $form_referrer = action('Cms\Admin\UserController@index');

        return view('cms.auth.login', compact('form_referrer'));
    }

    public function authenticated(Request $request, $user)
    {   
        $user->last_login = Carbon::now()->toDateTimeString();
        $user->save();
    }
}
