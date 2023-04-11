@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Beranda</h1>
<p class="mb-4">
    Ubah data pada form dibawah ini untuk update data pada tampilan beranda web
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
            Edit Data Beranda
            <a
                href="/dashboard/visi-misi/visi"
                class="btn btn-sm btn-danger float-end"
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
                action="/dashboard/beranda/1"
                class="my-3"
                enctype="multipart/form-data"
            >
                @method('put') @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Upload Image</label>
                    @if ($beranda->image)
                    <div style="max-height: 350px; overflow: hidden">
                        <img
                            class="img-preview img-fluid mb-3 col-sm-5"
                            src="{{asset('storage/' . $beranda->image)}}"
                            alt="{{$beranda->image}}"
                        />
                    </div>
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    @endif
                    <input
                        class="form-control @error('image') is-invalid @enderror"
                        type="file"
                        name="image"
                        value="{{ old('image', $beranda->image) }}"
                        id="image"
                        onchange="previewImage()"
                    />
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input
                        id="deskripsi"
                        value="{{ old('image', $beranda->deskripsi) }}"
                        type="hidden"
                        name="deskripsi"
                    />
                    <trix-editor input="deskripsi"></trix-editor>
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
