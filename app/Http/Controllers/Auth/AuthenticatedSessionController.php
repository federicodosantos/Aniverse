<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function google() {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallbackProvider() {
        $callback = Socialite::driver('google')->user();

        $user = User::whereEmail($callback->getEmail())->first();

        $userId = Str::uuid();

        if (!$user) {
            Log::info('user id before create user : ,', [$userId]);
            $newUser = User::create([
                'id' => $userId,
                'name' => $callback->getName(),
                'email' => $callback->getEmail(),
                'avatar' => $callback->getAvatar(),
                'password' => null,
                'email_verified_at' => Carbon::now('Asia/Jakarta'),
            ]);
            Log::info('user id after create user : ,', [$newUser->id]);
            event(new Registered($newUser));
        }

        if ($user instanceof Authenticatable) {
            Log::info('yes you are');
        }
        
        if ($user instanceof User) {
            Log::info('no you are not');
        }
        Log::info('user id', [$newUser->id]);

        Auth::login($newUser, true);
        Log::info('success login with google');
        return redirect()->route('dashboard');
    }
}
