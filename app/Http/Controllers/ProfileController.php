<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Flasher\Prime\FlasherInterface;


class ProfileController extends Controller
{
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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password'      => 'required|min:6',
            'password'              => 'required|min:6|confirmed|different:current_password',
            'password_confirmation' => 'required|min:6',
        ]);
        
        $hashedPassword = User::find(auth()->id())->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $new_password = Hash::make($request->password);

            $abc = User::find(auth()->id())->update([ 'password' => $new_password ]);
            
            toastr()->success('Your password has been updated successfully!');
            return redirect('/admin/password');

        }else{
            throw ValidationException::withMessages(['current_password' => 'Current password does not match']);
        }
    }
}
