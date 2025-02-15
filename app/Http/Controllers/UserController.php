<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.author.index', ["authors"=> User::where("role", "author")->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=> Hash::make("admin123"),
        ]);
        return redirect()->route('author.index')->with('success', 'Auteur créé avec succes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        return view('back.author.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $author)
    {
        $request->validated();
        $author->update($request->all());
        return redirect()->route('author.index')->with('success', 'Auteur Modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Auteur supprimé avec succes');
    }
}
