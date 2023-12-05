<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\userFormRequest;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new user();
        return view('admin.users.userForm',[
            'user' => new user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userFormRequest $request)
    {
        $user = user::create($request->validated())
        ->with('success', 'L\'utilisateur a été ajouté avec succés'); 
        return to_route('admin.user.index'); 
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.userForm',[
            'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(userFormRequest $request, User $user)
    {
        $user->update($request->validated());
        return to_route('admin.user.index')
        ->with('success', 'L\'utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.user.index')
        ->with('success', 'L\'utilisateur a bien été supprimé');
    }
}
