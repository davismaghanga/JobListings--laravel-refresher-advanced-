<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $userAttributes = $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>['required','confirmed',Password::min(6)],
        ]);

       $employerAttributes = $request->validate([
           'employer'=>['required'],
           'logo'=>['required', File::types(['png','jpg','webp'])]
       ]);

       $user = new User();
       $user->name = $userAttributes['name'];
       $user->email = $userAttributes['email'];
       $user->password = Hash::make($userAttributes['password']);
       $user->save();
       $logoPath = $request->logo->store('logos');
       $user->employer()->create([
           //laravel understands that by virtue of the relationship,the user_id is saved automatically in employers table
           'name'=>$employerAttributes['employer'],
           'logo'=>$logoPath

       ]);
       Auth::login($user);
       return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
