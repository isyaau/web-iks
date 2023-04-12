@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftar Tingkat 2</h1>
<p class="mb-4">
    Silahkan isi form dibawah ini untuk melakukan pendaftaran akun pengguna
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Form Pendaftaran Tingkat 1
            <a href="/dashboard/akun" class="btn btn-sm btn-danger float-end"
                >Batal</a
            >
        </h6>
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <h1></h1>
            <form
                method="post"
                action="/dashboard/akun"
                class="my-3"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Role</label>
                    <select
                        class="form-select @error('role') is-invalid @enderror"
                        name="role"
                        required
                    >
                        <option
                            value="@if( old('role')) {{
                                old('role')
                            }} @else 2 @endif"
                            selected
                        >
                            @if(old('role')==1) Administrator
                            @elseif(old('role')==2) Ketua Cabang Daerah @else
                            Belum Diverivikasi @endif
                        </option>
                        <option value="1">Administrator</option>
                        <option value="2">Ketua Cabang Daerah</option>
                    </select>
                </div>
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
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        name="username"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        name="password"
                    />
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    <input
                        class="form-control @error('foto') is-invalid @enderror"
                        type="file"
                        name="foto"
                        id="foto"
                        onchange="previewImage()"
                    />
                    @error('foto')
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
        const foto = document.querySelector("#foto");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
@endsection
