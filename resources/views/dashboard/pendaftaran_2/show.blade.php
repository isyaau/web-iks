@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftaran Tingkat 2</h1>
<p class="mb-4">
    Dibawah ini akan ditampilkan data lengkap data diri anggota
</p>

<div class="card">
    <h5 class="card-header">Detail Data {{ $anggota->nama }}</h5>
    <div class="card-body">
        <div class="card-title fs-4">{{ $anggota->nama }}  @if($anggota->status==1)<div class="float-end" style="color: rgb(255, 0, 0);"><i class="bi bi-patch-check-fill"></i> Diverifikasi</div> @else <div class="float-end" style="color: darkgray;"><i class="bi bi-patch-check-fill"></i> Belum Diverifikasi</div>@endif</div>
       
        <p class="card-text">
        <div class="row">
            <div class="col-lg-3 col-sm-4">Tempat, Tanggal Lahir</div>
            <div class="col">{{ $anggota->tempat_lahir }}, {{\Carbon\Carbon::parse($anggota->tanggal_lahir)->format('j F Y')}}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Alamat</div>
            <div class="col">{{ $anggota->alamat }}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Nomor Whatsapp</div>
            <div class="col">{{ $anggota->nomor }}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Cabang Daerah</div>
            <div class="col">{{ $anggota->cabang_daerah }}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Tingkat</div>
            <div class="col">{{ $anggota->tingkat }}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Angkatan</div>
            <div class="col">{{ $anggota->angkatan }}</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Foto Setengah Badan</div>
            <div class="col">
                <img src=" {{asset('storage/' . $anggota->foto_setengah_badan)}}" width="200" class="img-fluid mt-2"
                    alt=" {{$anggota->foto_setengah_badan}}">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-4">Foto Full Badan</div>
            <div class="col">
                <img src=" {{asset('storage/' . $anggota->foto_full_badan)}}" width="200" class="img-fluid mt-3"
                    alt=" {{$anggota->foto_full_badan}}">
            </div>
        </div>

        </p>
        <a href="/dashboard/anggota/anggota-tk-2" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endsection