@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Profil</h1>
<p class="mb-4">
    Ubah data pada form dibawah ini untuk update data pada tampilan profil web
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
                action="/dashboard/profil/1"
                class="my-3"
                enctype="multipart/form-data"
            >
                @method('put') @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Upload Bagan</label>
                    @if ($profil->bagan)
                    <div style="max-height: 350px; overflow: hidden">
                        <img
                            class="img-preview img-fluid mb-3 col-sm-5"
                            src="{{asset('storage/' . $profil->bagan)}}"
                            alt="{{$profil->bagan}}"
                        />
                    </div>
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    @endif
                    <input
                        class="form-control @error('bagan') is-invalid @enderror"
                        type="file"
                        name="bagan"
                        value="{{ old('bagan', $profil->bagan) }}"
                        id="bagan"
                        onchange="previewImage()"
                    />
                    @error('bagan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    @error('visi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input
                        id="visi"
                        value="{{ old('bagan', $profil->visi) }}"
                        type="hidden"
                        name="visi"
                    />
                    <trix-editor input="visi"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="misi" class="form-label">Misi</label>
                    @error('misi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input
                        id="misi"
                        value="{{ old('bagan', $profil->misi) }}"
                        type="hidden"
                        name="misi"
                    />
                    <trix-editor input="misi"></trix-editor>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const bagan = document.querySelector("#bagan");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(bagan.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
@endsection
