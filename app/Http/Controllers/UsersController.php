<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('pages.users.login');
    }
    public function register()
    {
        return view('pages.users.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function users_store(Request $request)
    {
        $validated = $request->validate([
            'nom'       => 'required',
            'prenom'    => 'required',
            'telephone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        User::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'telephone' =>$request->telephone,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('login');

        // return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
