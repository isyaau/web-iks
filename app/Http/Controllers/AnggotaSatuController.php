<?php

namespace App\Http\Controllers;


use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateWargaRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreAnggotaSatuRequest;
use App\Http\Requests\UpdateAnggotaSatuRequest;

class AnggotaSatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.anggota_1.index', [
            'anggota' => Anggota::where('tingkat', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.anggota_1.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaSatuRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->file('foto_setengah_badan')) {
            $validatedData['foto_setengah_badan'] = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            $validatedData['foto_full_badan'] = $request->file('foto_full_badan')->store('post-images');
        }

        $validatedData['tingkat'] = 1;


        Anggota::create($validatedData);

        return redirect('/dashboard/anggota/anggota-tk-1')->with('success', 'Anggota baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.anggota_1.show', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota, $id)
    {
        $anggota = $anggota->find($id);
        return view('dashboard.anggota_1.edit', [
            // 'txtid' => $id_warga,
            'anggota' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaSatuRequest $request, Anggota $anggota, $id)
    {
        $request->validate([
            'nama' => 'required|unique:anggota,nama,' . $id,
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:255',
            'nomor' => 'required|numeric|max:255',
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

        return redirect('/dashboard/anggota/anggota-tk-1')->with('success', 'Data Anggota berhasil diupdate!');
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

        return redirect('/dashboard/anggota/anggota-tk-1')->with('success', 'Data Anggota berhasil dihapus!');
    }
}
