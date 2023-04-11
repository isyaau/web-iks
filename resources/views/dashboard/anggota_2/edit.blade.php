@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftar Tingkat 2</h1>
<p class="mb-4">
    DataTables is a third party plugin that is used to generate the demo table
    below. For more information about DataTables, please visit the
    <a target="_blank" href="https://datatables.net"
        >official DataTables documentation</a
    >.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Edit Data {{ $anggota->nama }}
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
                action="/dashboard/anggota/anggota-tk-2/{{$anggota->id}}"
                class="my-3"
                enctype="multipart/form-data"
            >
                @method('put') @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        name="status"
                        required
                    >
                        <option
                            value="{{ old('status', $anggota->status) }}"
                            selected
                        >
                            @if(old('status', $anggota->status)==1) Diverifikasi
                            @else Belum Diverifikasi @endif
                        </option>
                        <option value="1">Diverifikasi</option>
                        <option value="2">Belum Diverifikasi</option>
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
                        value="{{ old('nama', $anggota->nama) }}"
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
                        value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}"
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
                        value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}"
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
                        value="{{ old('alamat', $anggota->alamat) }}"
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
                        value="{{ old('nomor', $anggota->nomor) }}"
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
                        value="{{ old('cabang_daerah', $anggota->cabang_daerah) }}"
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
                        value="{{ old('angkatan', $anggota->angkatan) }}"
                    />
                    @error('angkatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tingkat" class="form-label">Status</label>
                    <select
                        class="form-select @error('tingkat') is-invalid @enderror"
                        name="tingkat"
                        required
                    >
                        <option
                            value="{{ old('tingkat', $anggota->tingkat) }}"
                            selected
                        >
                            @if(old('tingkat', $anggota->tingkat)==1) Warga
                            @else Pendekar @endif
                        </option>
                        <option value="1">Warga</option>
                        <option value="2">Pendekar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label"
                        >Foto Setengah Badan</label
                    >
                    @if ($anggota->foto_setengah_badan)
                    <div style="max-height: 350px; overflow: hidden">
                        <img
                            class="img-preview img-fluid mb-3 col-sm-5"
                            src="{{asset('storage/' . $anggota->foto_setengah_badan)}}"
                            alt="{{$anggota->foto_setengah_badan}}"
                        />
                    </div>
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    @endif
                    <input
                        class="form-control @error('foto_setengah_badan') is-invalid @enderror"
                        type="file"
                        name="foto_setengah_badan"
                        value="{{ old('foto_setengah_badan', $anggota->foto_setengah_badan) }}"
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
                    @if ($anggota->foto_full_badan)
                    <div style="max-height: 350px; overflow: hidden">
                        <img
                            class="img-previewfull img-fluid mb-3 col-sm-5"
                            src="{{asset('storage/' . $anggota->foto_full_badan)}}"
                            alt="{{$anggota->foto_full_badan}}"
                        />
                    </div>
                    @else
                    <img class="img-previewfull img-fluid mb-3 col-sm-5" />
                    @endif
                    <input
                        class="form-control @error('foto_full_badan') is-invalid @enderror"
                        type="file"
                        name="foto_full_badan"
                        value="{{ old('foto_full_badan', $anggota->foto_full_badan) }}"
                        id="foto_full_badan"
                        onchange="previewImageFull()"
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
