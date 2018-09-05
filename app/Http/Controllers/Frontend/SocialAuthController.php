<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use App\Models\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Redirect;
use Socialite;
use Auth;
use App\Models\User;
use GuzzleHttp\Client;

class SocialAuthController extends Controller {

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser === 'duplicate-email' || is_null($authUser)) {
            flash()->success('<h5>Maaf,</h5><p>Login kamu gagal</p>');
            return redirect('/');
        }
        Auth::login($authUser, true);
        return redirect('/');
    }
    public function findOrCreateUser($user, $provider)
    {
        $hasuser = $user->id ?? null;
        if (!is_null($hasuser)) {
            $authUser = User::where('provider_id', $user->id)->first();
            $emailUser = User::where('email', $user->email)->first();
            if ($authUser) {
                return $authUser;
            }
            if ($emailUser) {
                return 'duplicate-email';
            }
            $user =  User::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);
            $user->syncRoles(['member']);
            return $user;
        }
        return null;
    }
}
