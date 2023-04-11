@extends('layouts.main') @section('container')

<!-- Start Struktur -->
<div class="container">
    <div class="my-3">
        <h1 class="text-center text-danger fw-bold">Cek Data Warga IKS PI</h1>
        <p class="text-center text-danger">
            Cek data anggota yang ingin kamu ketahui
        </p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <form action="/cek-anggota/hasil" method="get">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari nama warga"
                            name="cari"
                        />
                        <button class="btn btn-danger" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Struktur -->
    <hr />
    <!-- Start Sejarah -->
    <div class="container mb-5">
        <br />
        <div class="mb-3">
            <h1 class="text-center text-danger fw-bold">Hasil</h1>
            <p class="text-center text-danger">
                Data yang anda cari akan muncul di bawah ini
            </p>
        </div>
        @if(count($data) > 0)
        <div class="row">
            <div class="col-md d-flex justify-content-center">
                <div
                    class="card @if($data[0]->status==1) bg-danger @else bg-primary @endif"
                    style="width: 50rem"
                >
                    <div class="card-header fw-bold text-light text-center">
                        {{ $data[0]->nama }}
                    </div>
                    <ul class="list-group list-group-flush text-danger">
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Status</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    @if($data[0]->status==1)
                                    <div
                                        class="@if($data[0]->status==1) text-primary @else text-danger @endif"
                                    >
                                        <i class="bi bi-patch-check-fill"></i>
                                        Diverifikasi
                                    </div>
                                    @else
                                    <div style="color: darkgray">
                                        <i class="bi bi-patch-check-fill"></i>
                                        Belum Diverifikasi
                                    </div>
                                    @endif
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">
                                    Tempat, Tangggal Lahir
                                </li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    {{ $data[0]->tempat_lahir }},
                                    {{\Carbon\Carbon::parse($data[0]->tanggal_lahir)->format('j F Y')}}
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Alamat</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    {{ $data[0]->alamat }}
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Angkatan</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    {{ $data[0]->angkatan }}
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Cabang Daerah</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    {{ $data[0]->cabang_daerah }}
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Tingkat</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item text-danger">
                                    <b
                                        >@if($data[0]->tingkat==1)<span
                                            class="badge rounded-pill bg-primary"
                                            >Tingkat 1 (Warga)</span
                                        >@else<span
                                            class="badge rounded-pill bg-danger"
                                            >Tingkat 2 (Pendekar)</span
                                        >@endif</b
                                    >
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">
                                    Foto Setengah Badan
                                </li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    <img
                                        src="{{asset('storage/' .  $data[0]->foto_setengah_badan )}}"
                                        alt=""
                                        class="cover"
                                        width="200px"
                                    />
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <li class="list-group-item">Foto Full Badan</li>
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    <img
                                        src="{{asset('storage/' .  $data[0]->foto_full_badan )}}"
                                        alt=""
                                        class="cover"
                                        width="200px"
                                    />
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Nama yang anda
                cari tidak ditemukan!
            </div>
        </div>
        @endif
    </div>
</div>

<!-- End Sejarah -->
@endsection
