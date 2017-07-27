<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use Mail;
use Hash;



class AuthFacebookController extends Controller
{
    //
     /**

     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
 
        $authUser = $this->findOrCreateUser($user);
        
        Auth::login($authUser, true);
 


        return redirect()->route('trangchu');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }

        $email = $facebookUser->email;

        $password = str_random(9);

        $pass_encode = Hash::make($password);
        if($email==null)
        {
            return User::create([
            'full_name' => $facebookUser->name,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar,
            'password' => $pass_encode
            ]);
        }
        else
        {
            Mail::send('home.mailsample', array('name'=>$facebookUser->name,'email'=>$facebookUser->email, 'password'=>$password), function($message) use ($email){
            $message->to($email,'Chào quý khách')->subject('Phản hồi khách hàng!');
            });


            return User::create([
            'full_name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar,
            'password' => $pass_encode
            ]);
        }

    }
}
