<?php

namespace App\Providers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Auth::viaRequest('jwt', function(Request $request) {
            try {

                $tokenPayload = JWT::decode($request->bearerToken(), new Key(config('jwt.key'), 'HS512'));

                return User::find($tokenPayload)->first();

            } catch (\Throwable $th) {
                Log::error($th);
                return null;
            }
        });
    }
}
