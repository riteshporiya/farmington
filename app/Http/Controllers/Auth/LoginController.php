<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Post;
use App\Models\Scheme;
use App\Models\Testimonial;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 */
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    protected function sendLoginResponse(Request $request): RedirectResponse
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if (getLoggedInUser()->user_type == User::ADMIN) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        if (getLoggedInUser()->user_type == User::USER) {
            return redirect(RouteServiceProvider::USER_HOME);
        }

        if (isset($request->remember)) {
            return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath())
                    ->withCookie(\Cookie::make('email', $request->email, 3600))
                    ->withCookie(\Cookie::make('password', $request->password, 3600))
                    ->withCookie(\Cookie::make('remember', 1, 3600));
        }

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath())
                ->withCookie(\Cookie::forget('email'))
                ->withCookie(\Cookie::forget('password'))
                ->withCookie(\Cookie::forget('remember'));
    }

    /**
     * @param  Request  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        $role = $this->guard()->user()->user_type;
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($role == User::ADMIN) {
            return redirect(url('/admin/login'));
        }
        if ($role == User::USER) {
            return redirect(url('/'));
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAdminLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserLoginForm()
    {
        return view('auth.user_login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserRegisterForm()
    {
        return view('auth.register');
    }

    /**

     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showHome()
    {
        $plants = Plant::with('plantType', 'plantUse')->where('is_active', true)->orderByDesc('created_at')->limit(4)->get();
        $blogs = Post::with('user')->where('is_active', true)->orderByDesc('created_at')->limit(3)->get();
        $testimonials = Testimonial::where('is_active', true)->get();
        $schemes = Scheme::where('is_active', true)->get();
        
        return view('front.home.home', compact('plants', 'blogs', 'testimonials', 'schemes'));
    }
}
