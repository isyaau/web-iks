<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisiRequest;
use App\Http\Requests\UpdateVisiRequest;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.visi.index', [
            'visi' => VisiMisi::where('keterangan', 'visi')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.visi.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisiRequest $request)
    {
        $validatedData = $request->validate([
            'isi' => 'required|max:255',

        ]);
        // $request->validated();
        if ($request->file('foto_setengah_badan')) {
            $validatedData['foto_setengah_badan'] = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            $validatedData['foto_full_badan'] = $request->file('foto_full_badan')->store('post-images');
        }

        $validatedData['keterangan'] = 'visi';

        VisiMisi::create($validatedData);

        return redirect('/dashboard/visi-misi/visi')->with('success', 'Anggota baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visimisi, $id)
    {
        $visi = $visimisi->find($id);
        return view('dashboard.visi.show', [
            'visi' => $visi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visimisi)
    {
        $visimisi = $visimisi->find(1);
        return view('dashboard.visi.edit', [
            'visi' => $visimisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisiRequest $request, VisiMisi $visimisi, $id)
    {
        $request->validate([
            'isi' => 'required|max:255'

        ]);

        $data = $visimisi->find($id);
        $data->isi = $request->isi;
        $data->save();

        return redirect('/dashboard/profil')->with('success', 'Data Misi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visimisi, $id)
    {
        $data = $visimisi->find($id);
        $data->delete();
        // Anggota::destroy($anggota->id);

        return redirect('/dashboard/visi-misi/visi')->with('success', 'Data Visi berhasil dihapus!');
    }
}
