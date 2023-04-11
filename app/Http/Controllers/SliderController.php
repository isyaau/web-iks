<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.slider.index', [
            'slider' => Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'dashboard.slider.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'caption' => 'required|max:255',
            'image' => 'image|file'

        ]);
        // $request->validated();
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }



        Slider::create($validatedData);

        return redirect('/dashboard/slider')->with('success', 'Slider baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $slider = $slider->find($slider->id);
        return view('dashboard.slider.edit', [
            // 'txtid' => $id_warga,
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $rules = [
            'judul' => 'required|max:255',
            'caption' => 'required|max:255',
            'image' => 'image|file|max:1024',

        ];



        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }



        Slider::where('id', $slider->id)->update($validatedData);



        // $request->validate([
        //     'image' => 'image|file',
        //     'caption' => 'required|max:255',
        // ]);

        // $data = $slider->find($id);
        // $data->image = $request->image;
        // $data->caption = $request->caption;

        // if ($request->file('image')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $data->image = $request->file('image')->store('post-images');
        // }
        // $data->save();

        return redirect('/dashboard/slider')->with('success', 'Data Slider berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::delete($slider->image);
        }
        Slider::destroy($slider->id);

        return redirect('/dashboard/slider')->with('success', 'Data slider berhasil dihapus!');
    }
}
