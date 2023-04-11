@extends('layouts.main') @section('container')

<!-- Start Content -->
<div class="container p-5">
    <h1>Form Pendaftaran Tingkat 1</h1>
    <div class="col-md-6 my-5">
        <form
            method="post"
            action="/pendaftaran-tingkat-1"
            class="my-3"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                    type="text"
                    class="form-control @error('nama') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="nama"
                    value="{{ old('nama') }}"
                />
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Tempat Lahir</label>
                <input
                    type="text"
                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="tempat_lahir"
                    value="{{ old('tempat_lahir') }}"
                />
                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Tanggal Lahir</label>
                <input
                    type="date"
                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="tanggal_lahir"
                    value="{{ old('tanggal_lahir') }}"
                />
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Alamat</label>
                <input
                    type="text"
                    class="form-control @error('alamat') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="alamat"
                    value="{{ old('alamat') }}"
                />
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor Whatsapp</label>
                <input
                    type="text"
                    class="form-control @error('nomor') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="nomor"
                    value="{{ old('nomor') }}"
                />
                @error('nomor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cabang_daerah" class="form-label"
                    >Cabang Daerah</label
                >
                <input
                    type="text"
                    class="form-control @error('cabang_daerah') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="cabang_daerah"
                    value="{{ old('cabang_daerah') }}"
                />
                @error('cabang_daerah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input
                    type="text"
                    class="form-control @error('angkatan') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    name="angkatan"
                    value="{{ old('angkatan') }}"
                />
                @error('angkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Foto Setengah Badan</label>
                <img class="img-preview img-fluid mb-3 col-sm-5" />
                <input
                    class="form-control @error('foto_setengah_badan') is-invalid @enderror"
                    type="file"
                    name="foto_setengah_badan"
                    id="foto_setengah_badan"
                    onchange="previewImage()"
                />
                @error('foto_setengah_badan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Foto Full Badan</label>
                <img class="img-preview2 img-fluid mb-3 col-sm-5" />
                <input
                    class="form-control @error('foto_full_badan') is-invalid @enderror"
                    type="file"
                    name="foto_full_badan"
                    id="foto_full_badan"
                    onchange="previewImage2()"
                />
                @error('foto_full_badan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const foto_setengah_badan = document.querySelector(
            "#foto_setengah_badan"
        );
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto_setengah_badan.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
    function previewImage2() {
        const foto_full_badan = document.querySelector("#foto_full_badan");
        const imgPreview2 = document.querySelector(".img-preview2");

        imgPreview2.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto_full_badan.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview2.src = oFREvent.target.result;
        };
    }
</script>
<!-- End Content -->
@endsection
