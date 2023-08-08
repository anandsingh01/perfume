<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();


        // Check if the user exists in your database based on the Google email
        $existingUser = User::where('email', $googleUser->email)->first();

         if ($existingUser) {
             Auth::login($existingUser);
         } else {
             // If the user does not exist, create a new user record in your database
             $newUser = User::create([
                 'name' => $googleUser->name,
                 'email' => $googleUser->email,
                 // You can set a random password for Google-authenticated users or leave it blank.
                 // Google users won't use the password for logging in as they'll use OAuth.
                 'password' => Hash::make($googleUser->email), // Empty password or set it to null, depending on your application logic
                 'salt_password' => $googleUser->email, // Empty password or set it to null, depending on your application logic
                 // Add any additional fields as needed for your user table
             ]);

             // Authenticate the newly registered user
             Auth::login($newUser);
         }
        // Redirect the authenticated user to the desired page
        return redirect('/dashboard');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();


        // Check if the user exists in your database based on the Google email
        $existingUser = User::where('email', $facebookUser->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // If the user does not exist, create a new user record in your database
            $newUser = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                // You can set a random password for Google-authenticated users or leave it blank.
                // Google users won't use the password for logging in as they'll use OAuth.
                'password' => Hash::make($facebookUser->email), // Empty password or set it to null, depending on your application logic
                'salt_password' => $facebookUser->email, // Empty password or set it to null, depending on your application logic
                // Add any additional fields as needed for your user table
            ]);

            // Authenticate the newly registered user
            Auth::login($newUser);
        }
        // Redirect the authenticated user to the desired page
        return redirect('/dashboard');
    }

    public function redirectTo() {
        $role = Auth::user()->role;
        switch ($role) {
            case '1':
                return '/admin/dashboard';
                break;
            case '2':
                return '/user-dashboard';
                break;

            default:
                return '/home';
                break;
        }
    }

    function login_page(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('web.login_page');
            }
        }else{
            return view('web.login_page');
        }
    }

    public function login(Request $request)
    {
//        print_r($request->all());die;
        $username = $request->username; //the input field has name='username' in form
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
//            echo 'e';
            Auth::attempt(['email' => $username, 'password' => $password]);
        } else {
            echo 'n';
            //they sent their username instead
            Auth::attempt(['username' => $username, 'password' => $password]);
        }
        if ( Auth::check() ) {
            return redirect(url('admin/dashboard'));
        }else{
            return redirect(url('login'));
        }

    }

    public function check_login(Request $request)
    {
//        print_r($request->all());die;
        $username = $request->email; //the input field has name='username' in form
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
//            echo 'e';
            Auth::attempt(['email' => $username, 'password' => $password]);
        } else {
//            echo 'n';
//            die;
            //they sent their username instead
            Auth::attempt(['email' => $username, 'password' => $password]);
        }
        if ( Auth::check() ) {
//            echo "yes";
            if(Auth::user()->role == 2){
                return redirect(url('/'));
            }else{
                return redirect(url('/'));
            }

        }else{
//            echo "np";

            return redirect(url('login'));
        }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
