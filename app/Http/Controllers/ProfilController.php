<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        $profil = $profil->find(1);
        return view('dashboard.profil.edit', [
            'profil' => $profil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'bagan' => 'image|file',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $data = $profil->find(1);
        $data->visi = $request->visi;
        $data->misi = $request->misi;

        if ($request->file('bagan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data->bagan = $request->file('bagan')->store('post-images');
        }
        $data->save();

        return redirect('/dashboard/profil/1/edit')->with('success', 'Data Profil berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
