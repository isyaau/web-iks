@extends('layouts.main') @section('container')

<!-- Start Slider -->
<div
    id="carouselExampleInterval"
    class="carousel slide"
    data-bs-ride="carousel"
>
    <div class="carousel-indicators">
        <button
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
        ></button>
        @for($i=1 ; $i< $jumlahSlider ; $i++)
        <button
            type="button"
            data-bs-target="#carouselExampleInterval"
            data-bs-slide-to="{{ $i }}"
            aria-label="Slide {{ $i + 1 }}"
        ></button>
        @endfor
    </div>
    <div class="carousel-inner">
        <div
            class="carousel-item active"
            style="max-height: 580px; overflow: hidden"
            data-bs-interval="10000"
        >
            <img
                src="{{asset('storage/' .  $slider[0]->image )}}"
                class="d-block w-100"
                alt="{{ $slider[0]->image }}"
            />
            <div
                class="carousel-caption d-none d-md-block bg-danger bg-gradient"
            >
                <h5>{{ $slider[0]->judul }}</h5>
                <p>
                    {{ $slider[0]->caption }}
                </p>
            </div>
        </div>
        @foreach($slider->skip(1) as $slider)
        <div
            class="carousel-item"
            style="max-height: 580px; overflow: hidden"
            data-bs-interval="2000"
        >
            <img
                src="{{asset('storage/' .  $slider->image )}}"
                class="d-block w-100"
                alt="{{ $slider->image }}"
            />
            <div
                class="carousel-caption d-none d-md-block bg-danger bg-gradient"
            >
                <h5>{{ $slider->judul }}</h5>
                <p>
                    {{$slider->caption}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End Slider -->

<!-- Start Sejarah -->
<div class="mb-3 mt-5">
    <h1 class="text-center text-danger fw-bold">Sejarah IKS PI</h1>
    <p class="text-center text-danger">
        Jelajahi sejarah, temukan kisah inspiratif, dan ambil pelajaran berharga
        dari peristiwa masa lalu.
    </p>
</div>
<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div
        class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden"
    >
        <div style="max-width: 580px; max-height: 350px; overflow: hidden">
            <img
                src="{{asset('storage/' .  $beranda[0]->image )}}"
                width="600px"
                alt=""
                class="mr-3"
            />
        </div>
    </div>
    <div
        class="text-danger me-md-3 pt-3 px-5 pt-md-5 px-md-5 my-3 overflow-hidden"
    >
        <h3 class="fw-bold">Sejarah IKSPI</h3>
        {!! $beranda[0]->deskripsi !!}
    </div>
</div>
<!-- End Sejarah -->

@if (session()->has('success'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div
        id="liveToast"
        class="toast"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-bs-delay="100000"
    >
        <div class="toast-header">
            <img
                src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
                class="rounded me-2"
                alt="..."
                width="20px"
            />
            <strong class="me-auto">IKS PI Notification</strong>
            <small>now</small>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="toast"
                aria-label="Close"
            ></button>
        </div>
        <div class="toast-body">{{ session("success") }}</div>
    </div>
</div>
@endif @endsection
