<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;

class SocialiteController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        if ( $customer =Customer::where('email', $user->email)->first())
        {
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);

            return redirect('/')->with('message', 'Login successful.');
        }else{
            $customer = new Customer();
            $customer->name = $user->name;
            $customer->email = $user->email;
            $customer->save();

            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);

            return redirect('/')->with('message', 'Register successful & you have logged in.');
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

    }
}
