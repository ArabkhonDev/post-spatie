<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class BasicAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || strpos($authHeader, 'Basic ') !== 0) {
            return response()->json(['message' => 'Unauthorized'], 401, ['WWW-Authenticate' => 'Basic']);
        }

        $encodedCredentials = substr($authHeader, 6);
        $decodedCredentials = base64_decode($encodedCredentials);

        if (!$decodedCredentials) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        list($username, $password) = explode(':', $decodedCredentials, 2);

        $user = User::where('email', $username)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Invalid username or password'], 401);
        }

        Auth::login($user);

        return $next($request);
    }
}