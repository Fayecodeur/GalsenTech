<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMedia\StoreSocialMediaRequest;
use App\Http\Requests\SocialMedia\UpdateSocialMediaRequest;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.social_media.index',['socials'=>SocialMedia::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.social_media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $request->validated();
        SocialMedia::create($request->all());
        return redirect()->route('social.index')->with('success', "Réseau ajouté avec succés");
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $social)
    {
        return view('back.social_media.create', ['social'=>$social]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $social)
    {
        $request->validated();
        $social->update($request->all());
        return redirect()->route('social.index')->with('success', "Réseau modifié avec succés");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();
        return redirect()->route('social.index')->with('success', "Réseau supprimé avec succés");
    }
}
