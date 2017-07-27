<?php

namespace App\Http\Controllers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Hash;


class AuthGoogleController extends Controller
{
    //
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }
 
        $authUser = $this->findOrCreateUser($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('trangchu');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $googleUser
     * @return User
     */
    private function findOrCreateUser($googleUser)
    {
        $authUser = User::where('google_id', $googleUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }

        $email = $googleUser->email;
        $password = str_random(9);
        $pass_encode = Hash::make($password);

        Mail::send('home.mailsample', array('name'=>$googleUser->name,'email'=>$googleUser->email, 'password'=>$password), function($message) use ($email){
            $message->to($email,'Chào quý khách')->subject('Phản hồi khách hàng!');

         });
 
        return User::create([
            'full_name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
            'password' => $pass_encode
        ]);
    }
}
