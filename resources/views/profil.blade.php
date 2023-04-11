@extends('layouts.main') @section('container')
<div class="container">
    <!-- Start Struktur -->
    <div class="my-3">
        <h1 class="text-center text-danger fw-bold">Struktur IKS PI</h1>
        <p class="text-center text-danger">
            Struktur organisasi pencak silat membantu anggotanya berkembang dan
            menerapkan nilai-nilai budaya dan moral yang dipegang teguh dalam
            praktik bela diri, serta memfasilitasi pertumbuhan dan pengembangan
            individu dalam kehidupan sehari-hari.
        </p>
        <div class="row d-flex justify-content-center">
            <img
                src="{{asset('storage/' .  $profil[0]->bagan )}}"
                alt="{{ $profil[0]->bagan }}"
                width="900px"
            />
            <!-- <div style="max-width: 900px; max-height: 350px; overflow: hidden">
            </div> -->
        </div>
    </div>
    <!-- End Struktur -->
    <hr />
    <!-- Start Sejarah -->
    <div class="container mb-5">
        <br />
        <div class="mb-3">
            <h1 class="text-center text-danger fw-bold">Visi & Misi IKS PI</h1>
            <p class="text-center text-danger">
                Mari kita simak visi misi organisasi pencak silat yang penuh
                semangat untuk mengembangkan dan memperkenalkan seni bela diri
                ini kepada masyarakat luas, dengan tetap mempertahankan
                nilai-nilai kejujuran, disiplin, dan semangat persaudaraan yang
                tinggi di antara anggota organisasi.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <div
                    class="card text-light bg-danger mb-3"
                    style="width: 28rem"
                >
                    <div class="card-header text-center"><b>Visi</b></div>
                    <div class="card-body">
                        <p class="card-text">{!! $profil[0]->visi !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div
                    class="card text-light bg-danger mb-3"
                    style="width: 28rem"
                >
                    <div class="card-header text-center"><b>Misi</b></div>
                    <div class="card-body">
                        <p class="card-text">{!! $profil[0]->misi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sejarah -->
@endsection
