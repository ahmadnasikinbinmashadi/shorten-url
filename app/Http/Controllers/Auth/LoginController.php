<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() 
    {
        return view('auth.login');
    }

    /**
    * Attempting login and create access token
    *
    */
    public function store(Request $request) 
    {
        // validation of request
        $validation = $this->validate($request, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        $credentials = $request->only(['email', 'password']);
        if (\Auth::attempt($credentials)) {
            $user        = Auth::user();
            flash()->success('Selamat datang '.$user->name);
            
            return redirect(route('admin.dashboard.index'));
        } else {
            flash()->error('Wrong username or password');

            return back();
            // return response()->json(['error' => 'Unauthorized'], 401); //Unauthorized. The user needs to be authenticated.
        }
    }
    
    /**
    * Logout
    *
    */
    public function logout()
    {
        \Session::flush();
        \Auth::logout();

        return redirect(route('admin.getLogin'));
    }
}
