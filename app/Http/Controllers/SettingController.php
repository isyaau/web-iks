<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
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
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun, $id)
    {
        $akun = $akun->find($id);
        return view('dashboard.setting', [
            'akun' => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akun $akun, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:akun,username,' . $id,
            'nama' => 'required|max:255',
            'foto' => 'image|file',
        ]);

        // if ($request->username != $akun->username) {
        //     $validatedData['username'] => 'required|unique:akun';
        // }
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


        Akun::where('id', $id)->update($validatedData);

        return redirect('/dashboard/index')->with('success', 'Akun baru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun)
    {
        //
    }
}
