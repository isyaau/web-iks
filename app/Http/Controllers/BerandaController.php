<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
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
    public function show(Beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beranda $beranda)
    {
        $beranda = $beranda->find(1);
        return view('dashboard.beranda.edit', [
            'beranda' => $beranda
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beranda $beranda)
    {
        $request->validate([
            'image' => 'image|file',
            'deskripsi' => 'required',
        ]);

        $data = $beranda->find(1);
        $data->deskripsi = $request->deskripsi;


        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data->image = $request->file('image')->store('post-images');
        }
        $data->save();

        return redirect('/dashboard/beranda/1/edit')->with('success', 'Data beranda berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beranda $beranda)
    {
        //
    }
}
