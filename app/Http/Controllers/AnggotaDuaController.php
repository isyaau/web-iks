<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnggotaDuaRequest;
use App\Http\Requests\UpdateAnggotaDuaRequest;

class AnggotaDuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.anggota_2.index', [
            'anggota' => Anggota::where('tingkat', 2)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.anggota_2.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaDuaRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:anggota,nama,',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:255',
            'nomor' => 'required|numeric|digits_between:1,13',
            'cabang_daerah' => 'required|max:255',
            'angkatan' => 'required|max:255',
            'status' => 'required|max:255',
            'foto_setengah_badan' => 'image|file',
            'foto_full_badan' => 'image|file',
        ]);
        // $request->validated();
        if ($request->file('foto_setengah_badan')) {
            $validatedData['foto_setengah_badan'] = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            $validatedData['foto_full_badan'] = $request->file('foto_full_badan')->store('post-images');
        }

        $validatedData['tingkat'] = 2;


        Anggota::create($validatedData);

        return redirect('/dashboard/anggota/anggota-tk-2')->with('success', 'Anggota baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.anggota_2.show', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.anggota_2.edit', [
            // 'txtid' => $id_warga,
            'anggota' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaDuaRequest $request, Anggota $anggota, $id)
    {
        $request->validate([
            'nama' => 'required|unique:anggota,nama,' . $id,
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:255',
            'nomor' => 'required|max:255',
            'cabang_daerah' => 'required|max:255',
            'angkatan' => 'required|max:255',
            'status' => 'required|max:255',
            'foto_setengah_badan' => 'image|file',
            'foto_full_badan' => 'image|file',
        ]);

        $data = $anggota->find($id);
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat = $request->alamat;
        $data->nomor = $request->nomor;
        $data->cabang_daerah = $request->cabang_daerah;
        $data->angkatan = $request->angkatan;
        $data->status = $request->status;
        if ($request->file('foto_setengah_badan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data->foto_setengah_badan = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data->foto_full_badan = $request->file('foto_full_badan')->store('post-images');
        }
        $data->save();

        return redirect('/dashboard/anggota/anggota-tk-2')->with('success', 'Data Anggota berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota, $id)
    {
        if ($anggota->foto_setengah_badan) {
            Storage::delete($anggota->foto_setengah_badan);
        }
        if ($anggota->foto_full_badan) {
            Storage::delete($anggota->foto_full_badan);
        }
        $data = $anggota->find($id);
        $data->delete();
        // Anggota::destroy($anggota->id);

        return redirect('/dashboard/anggota/anggota-tk-2')->with('success', 'Data Anggota berhasil dihapus!');
    }
}
