<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules\Password;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Exception;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|min:2|max:100',
                    'email' => 'required|string|email|unique:users,email',
                    'password' => 'required|string|min:4|max:100',
                    'confirm_password' => 'required|same:password',
                    'role' => 'string',
                    'profileimage' => 'required|image|mimes:jpg,png'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message'=>'Validations fails',
                    'errors'=>$validator->errors()
                ],422);
            }

        $image_name='profile-image-'.time().'.'.$request->profileimage->extension();
        $request->profileimage->move(public_path('/images/profilephoto'),$image_name);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'profileimage'=> $image_name          
        ]);

        return response()->json([
            'message' => 'Registration Successful',
            'data' => $user
            
        ],200);

        }
        
    }

    public function registerOrLoginGoogle(Request $data)
    {
        // $user = User::where('email', '=' , $data->email)->first();
        // if($user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->provider_id;
            $user->profileimage = $data->profileimage;
            $user->save();

        
        return response()->json(
            [
                'message' => 'asdfgb'
            ]
        );        
    }


    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json(
            [
                'message' => 'Logged out'
            ]
        );

    }

    public function login(LoginRequest $request) {

        $request->authenticate();
        $token = $request->user()->createToken('mytoken');

        return response()->json(
            [
                'message'=>'logged in',
                'data'=> [
                    'user'=>$request->user(),
                    'token'=>$token->plainTextToken
                ]
            ]
                );
    }

    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }
        $request->user()->sendEmailVerificationNotification();
        return [ 'status' => 'verification link sent'];
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Email already verified'
            ];
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message'=>'Email has been verified'
        ];
    }


    // //Google Login
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // //Google Callback
    // public function handleGoogleCallback()
    // {
    //     $user = Socialite::driver('google')->user();

    //     $this->_registerOrLoginUser();
    //     return redirect()->route('localhost:3000/studentdashboard');
    // }

    // //Facebook Login
    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // //Facebook Callback
    // public function handleFacebookCallback()
    // {
    //     $user = Socialite::driver('facebook')->user();

    //     $this->_registerOrLoginUser();
    //     return redirect()->route('localhost:3000/studentdashboard');
    // }

    
    // //Github Login
    // public function redirectToGithub()
    // {
    //     return Socialite::driver('github')->redirect();
    // }



    // //Github Callback
    // public function handleGithubCallback()
    // {
    //     $user = Socialite::driver('github')->user();

    //     $this->_registerOrLoginUser();
    //     return redirect()->route('localhost:3000/studentdashboard');
    // }


    // protected function _registerOrLoginUser($data)
    // {
    //     $user = User::where('email', '=' , $data->email)->first();
    //     if($user) {
    //         $user = new User();
    //         $user->name = $data->name;
    //         $user->email = $data->email;
    //         $user->provider_id = $data->id;
    //         $user->profileimage = $data->avatar;
    //         $user->save();

    //     }
    //     Auth::login($user);
    // }


    public function index($id)
    {
        $Auth = User::findOrFail($id);
        return $Auth;
    }

}