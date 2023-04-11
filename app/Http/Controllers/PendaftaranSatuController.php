<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendaftaranSatuRequest;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PendaftaranSatuController extends Controller
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
        return view(
            'form_tingkat1'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendaftaranSatuRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->file('foto_setengah_badan')) {
            $validatedData['foto_setengah_badan'] = $request->file('foto_setengah_badan')->store('post-images');
        }
        if ($request->file('foto_full_badan')) {
            $validatedData['foto_full_badan'] = $request->file('foto_full_badan')->store('post-images');
        }

        $validatedData['tingkat'] = 1;
        $validatedData['status'] = 2;


        Anggota::create($validatedData);

        return redirect('/')->with('success', 'Selamat data yang anda kirim telah kami terima. Silahkan cek update status anda di menu cek data anggota. Tunggu kabar dari kami untuk update selanjutnya melalui whatsapp anda');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
