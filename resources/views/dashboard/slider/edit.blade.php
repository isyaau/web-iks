@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Slider</h1>
<p class="mb-4">
    Ubah data pada form dibawah ini untuk update data pada tampilan slider web
</p>
@if (session()->has('success'))
<div class="d-flex justify-content-end">
    <div
        class="alert alert-success alert-dismissible fade show col-lg-8"
        role="alert"
    >
        {{ session("success") }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
    </div>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Edit Data Profil
            <a href="/dashboard/slider" class="btn btn-sm btn-danger float-end"
                >Batal</a
            >
        </h6>
    </div>
    <div class="card-body">
        <div class="col-md-8">
            <h1></h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form
                method="post"
                action="/dashboard/slider/{{ $slider->id }}"
                class="my-3"
                enctype="multipart/form-data"
            >
                @method('put') @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input
                        type="text"
                        class="form-control @error('judul') is-invalid @enderror"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        name="judul"
                        value="{{ old('judul', $slider->judul) }}"
                    />
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea
                        class="form-control @error('caption') is-invalid @enderror"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        name="caption"
                        >{{ old('caption', $slider->caption) }}</textarea
                    >
                    @error('caption')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Upload Image</label>
                    @if ($slider->image)
                    <div style="max-height: 350px; overflow: hidden">
                        <img
                            class="img-preview img-fluid mb-3 col-sm-5"
                            src="{{asset('storage/' . $slider->image)}}"
                            alt="{{$slider->image}}"
                        />
                    </div>
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    @endif
                    <input
                        class="form-control @error('image') is-invalid @enderror"
                        type="file"
                        name="image"
                        value="{{ old('image', $slider->image) }}"
                        id="image"
                        onchange="previewImage()"
                    />
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
@endsection
