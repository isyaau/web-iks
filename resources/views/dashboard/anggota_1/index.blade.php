@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftar Tingkat 1</h1>
<p class="mb-4">
    Data Pendaftar yang masuk dengan tingkat 1 atau Warga akan ditampilkan pada tabel dibawah ini.
</p>
@if (session()->has('success'))
<div class="d-flex justify-content-end">
    <div
        class="alert alert-success alert-dismissible fade show col-lg-8"
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
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Pendaftar Tingkat 1
            <a
                href="/dashboard/anggota/anggota-tk-1/create"
                class="btn btn-sm btn-primary float-end"
                >Tambah Data</a
            >
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-bordered"
                id="dataTable"
                width="100%"
                cellspacing="0"
            >
                <thead>
                    <tr>
                        <th style="width: 5px">No</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Angkatan</th>
                        <th>Cabang</th>
                        <th>Status</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Angkatan</th>
                        <th>Cabang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($anggota as $anggota)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$anggota->nama}}</td>
                        <td>
                            {{$anggota->tempat_lahir}},
                            {{\Carbon\Carbon::parse($anggota->tanggal_lahir)->format('j F Y')}}
                        </td>
                        <td>{{$anggota->alamat}}</td>
                        <td>{{$anggota->angkatan}}</td>
                        <td>{{$anggota->cabang_daerah}}</td>
                        <td class="text-center text-white">{{$anggota->status}}@if($anggota->status==1)<div class="text-primary"><i class="bi bi-patch-check-fill"></i></div> @else <div style="color: darkgray;"><i class="bi bi-patch-check-fill"></i></div>@endif</div>{{$anggota->status}}</td>
                        <td>
                            <a
                                href="/dashboard/anggota/anggota-tk-1/{{$anggota->id}}/edit"
                                class="btn btn-sm btn-info"
                            >
                                <i class="bi bi-pen-fill"></i
                            ></a>

                            <form
                                action="/dashboard/anggota/anggota-tk-1/{{$anggota->id}}"
                                method="post"
                                class="d-inline"
                            >
                                @method('delete') @csrf
                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure ?')"
                                >
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                            <a
                                href="/dashboard/anggota/anggota-tk-1/{{$anggota->id}}"
                                class="btn btn-sm btn-warning"
                            >
                                <i class="bi bi-eye-fill"></i
                            ></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
