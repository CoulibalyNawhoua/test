<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function profile_user()
    {
        $users = Auth::user();
        return view('admin.utilisateurs.profil',compact('users'));
    }

    public function edit_user(Request $request): View
    {

        $user_id = Auth::user()->id;
        return view('admin.utilisateurs.edit_profil', compact('user_id'));
    }

    /**
     * Update the user's profile information.
     */

    public function update_user(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();

        if ($request->hasFile('avatar')) {
            $path = Storage::disk('public')->putFile('avatars',$request->avatar, 'public');
            $user->photo = $path;
        }
        else{
            $user->photo = '';
        }
        ;

        $user->update([

            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'telephone' => $input['telephone'],

        ]);

        $user->save();

        return Redirect()->back()->with('success', 'profil modifier avec succès !');
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
