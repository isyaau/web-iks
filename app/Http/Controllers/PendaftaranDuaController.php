<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnggotaDuaRequest;
use App\Http\Requests\UpdateAnggotaDuaRequest;
use App\Http\Requests\StorePendaftaranDuaRequest;
use App\Http\Requests\UpdatePendaftaranDuaRequest;

class PendaftaranDuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pendaftaran_2.index', [
            'anggota' => Anggota::where('tingkat', 2)->where('cabang_daerah', auth()->user()->cabang_daerah)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.pendaftaran_2.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendaftaranDuaRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->file('foto_setengah_badan')) {
            $validatedData['foto_setengah_badan'] = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            $validatedData['foto_full_badan'] = $request->file('foto_full_badan')->store('post-images');
        }

        $validatedData['tingkat'] = 2;
        $validatedData['status'] = 2;
        $validatedData['cabang_daerah'] = auth()->user()->cabang_daerah;


        Anggota::create($validatedData);

        return redirect('/dashboard/pendaftaran/pendaftaran-tk-2')->with('success', 'Anggota baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.pendaftaran_2.show', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.pendaftaran_2.edit', [
            // 'txtid' => $id_warga,
            'anggota' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendaftaranDuaRequest $request, Anggota $anggota, $id)
    {
        $request->validate([
            'nama' => 'required|unique:anggota,nama,' . $id,
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:255',
            'nomor' => 'required|max:255',
            'angkatan' => 'required|max:255',
            'foto_setengah_badan' => 'image|file',
            'foto_full_badan' => 'image|file',
        ]);

        $data = $anggota->find($id);
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat = $request->alamat;
        $data->nomor = $request->nomor;
        $data->angkatan = $request->angkatan;
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

        return redirect('/dashboard/pendaftaran/pendaftaran-tk-2')->with('success', 'Data Anggota berhasil diupdate!');
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

        return redirect('/dashboard/pendaftaran/pendaftaran-tk-2')->with('success', 'Data Anggota berhasil dihapus!');
    }
}
