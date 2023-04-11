@extends('layouts.main') @section('container')

<!-- Start Struktur -->
<div class="container">
    <div class="my-3">
        <h1 class="text-center text-danger fw-bold">Cek Data Warga IKS PI</h1>
        <p class="text-center text-danger">
            Cek data anggota yang ingin kamu ketahui
        </p>
        <div class="row d-flex justify-content-center">
            <div class="text-center col-md-4">
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
    </div>
</div>
<!-- End Sejarah -->
@endsection
