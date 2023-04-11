@extends('layouts.main') @section('container')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-4">
            @if (session()->has('success'))
            <div
                class="alert alert-success alert-dismissible fade show"
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
            @endif @if (session()->has('loginError'))
            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >
                {{ session("loginError") }}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
            @endif
            <main class="form-signin w-100 m-auto my-5">
                <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input
                            type="text"
                            name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            placeholder="Username"
                            autofocus
                            required
                        />
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            placeholder="Password"
                            required
                        />
                        <label for="password">Password</label>
                        @error('paassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-danger" type="submit">
                        Login
                    </button>
                </form>
                <!-- <small class="d-block text-center mt-3"
                    >Not Registered ?
                    <a href="/register">Register Now!</a></small
                > -->
            </main>
        </div>
    </div>
</div>
@endsection
