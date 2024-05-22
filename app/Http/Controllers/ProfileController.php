<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\SupabaseService;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    protected $supabaseService;

    public function __construct(SupabaseService $supabaseService)
    {
        $this->supabaseService = $supabaseService;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            try {
                $response = $this->supabaseService->uploadImage($file);

                if ($response->status() == 200) {
                    $signedUrl = $this->supabaseService->getSignedUrl($file);
                    $user->avatar = $signedUrl;
                    Log::info('Avatar updated successfully.', ['user_id' => $user->id, 'signed_url' => $signedUrl]);
                } else {
                    Log::error("Failed to upload image to Supabase:", ['response' => $response->body()]);
                    return Redirect::route('profile.edit')->withErrors(['avatar' => 'Failed to upload image to Supabase.']);
                }
            } catch (\Exception $e) {
                Log::error('Exception occurred while uploading image to Supabase', ['exception' => $e]);
                return Redirect::route('profile.edit')->withErrors(['avatar' => 'Failed to upload image due to an error.']);
            }
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
