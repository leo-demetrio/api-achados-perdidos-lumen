<?php

namespace App\Providers;

use App\Models\User;
use App\Record;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function (Request $request) {
            if (!$request->hasHeader('Authorization')) {
                return null;
            }
            $authorization = $request->header('Authorization');
            $token = str_replace('Bearer ','', $authorization);
            $dadosAutentication = JWT::decode($token,env('Key_AuthServiceProvider'),['HS256']);
            //var_dump($dadosAutentication);exit;
            return Record::where('password', $dadosAutentication->password)->first();

        });
    }
}
