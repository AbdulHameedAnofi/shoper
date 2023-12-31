<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Auth::viaRequest('jwt', function(Request $request) {
            try {

                $tokenPayload = JWT::decode($request->bearerToken(), new Key(config('jwt.secret'), 'HS256'));

                return User::find($tokenPayload)->first();

            } catch (\Throwable $th) {
                Log::error($th);
                return null;
            }
        });
    }
}
