@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftar Tingkat 2</h1>
<p class="mb-4">
    Silahkan isi form dibawah ini untuk melakukan pendaftaran anggota tingkat 2
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Form Pendaftaran Tingkat 1
            <a
                href="/dashboard/anggota/anggota-tk-2"
                class="btn btn-sm btn-danger float-end"
                >Batal</a
            >
        </h6>
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <h1></h1>
            <form
                method="post"
                action="/dashboard/anggota/anggota-tk-2"
                class="my-3"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        name="status"
                        required
                    >
                        <option
                            value="@if( old('status')) {{
                                old('status')
                            }} @else 2 @endif"
                            selected
                        >
                            @if(old('status')==1) Diverifikasi
                            @elseif(old('status')==2) Belum Diverifikasi @else
                            Belum Diverivikasi @endif
                        </option>
                        <option value="1">Diverifikasi</option>
                        <option value="2">Belum Diverifikasi</option>
                    </select>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
                    <label for="nomor" class="form-label">No Whatsapp</label>
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
                    <label for="nama" class="form-label"
                        >Foto Setengah Badan</label
                    >
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
@endsection
