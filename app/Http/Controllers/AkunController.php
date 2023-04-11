<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:anggota,nama,',
            'username' => 'required|max:255|unique:akun,username,',
            'password' => 'required',
            'foto' => 'image|file',
        ]);
        // $request->validated();
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
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun)
    {
        return view('dashboard.akun.edit', [
            'akun' => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akun $akun)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'foto' => 'image|file',
        ]);

        if ($request->username != $akun->username) {
            $validatedData['username'] = 'required|unique:akun';
        }
        if ($request->password) {
            $validatedData['password'] = 'required|max:255';
        }
        $validatedData['password'] = Hash::make($validatedData['password']);

        // $validatedData = $request->validate($validatedData);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }


        Akun::where('id', $akun->id)->update($validatedData);

        return redirect('/dashboard/akun')->with('success', 'Akun baru berhasil diupdate!');


        // $request->validate([
        //     'nama' => 'required|max:255',
        //     'username' => 'required|unique:akun,username,' . $id,
        //     'foto' => 'image|file',
        // ]);

        // $data = $akun->find($id);
        // $data->nama = $request->nama;
        // $data->username = $request->username;
        // if ($request->password) {
        //     $data->password = Hash::make($request->password);
        // }
        // if ($request->file('foto')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $data->foto = $request->file('foto')->store('post-images');
        // }
        // $data->save();

        // return redirect('/dashboard/akun')->with('success', 'Data Akun berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun)
    {
        if ($akun->foto) {
            Storage::delete($akun->foto);
        }
        Akun::destroy($akun->id);

        return redirect('/dashboard/akun')->with('success', 'Data akun berhasil dihapus!');
    }
}
