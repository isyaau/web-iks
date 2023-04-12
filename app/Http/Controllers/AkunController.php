<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAkunRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAkunRequest;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.akun.index', [
            'akun' => Akun::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.akun.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAkunRequest  $request)
    {
        $validatedData = $request->validated();
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);


        Akun::create($validatedData);

        return redirect('/dashboard/akun')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akun $akun, $id)
    {

        $akun = $akun->find($id);
        return view('dashboard.akun.show', [
            'akun' =>  $akun
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun)
    {
        $akun = $akun->findOrFail($akun->id);
        return view('dashboard.akun.edit', [
            // 'txtid' => $id_warga,
            'akun' => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akun $akun)
    {

        $validatedData = $request->validate([
            // 'username' => 'required|unique:akun,username,' . $id,
            'nama' => 'required|max:255',
            'role' => 'required|max:255',
            'cabang_daerah' => 'required|max:255',
            'foto' => 'image|file',
        ]);

        if ($request->username != $akun->username) {
            $validatedData['username'] = 'required|unique:akun';
        }
        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        }


        // $validatedData = $request->validate($validatedData);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }


        Akun::where('id', $akun->id)->update($validatedData);

        return redirect('/dashboard/akun')->with('success', 'Akun baru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun, $id)
    {
        if ($akun->foto) {
            Storage::delete($akun->foto);
        }
        $data = $akun->find($id);
        $data->delete();
        // Anggota::destroy($akun->id);

        return redirect('/dashboard/akun')->with('success', 'Data akun berhasil dihapus!');
    }
}
