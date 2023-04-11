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
        <h6 class="m-0 font-weight-bold text-danger">
            Daftar Visi
            <a
                href="/dashboard/visi-misi/visi/create"
                class="btn btn-sm btn-danger float-end"
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
                        <th style="width: 20px">No</th>
                        <th>Visi</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Visi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($visi as $visi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$visi->isi}}</td>

                        <td>
                            <a
                                href="/dashboard/visi-misi/visi/{{$visi->id}}/edit"
                                class="btn btn-sm btn-info"
                            >
                                <i class="bi bi-pen-fill"></i
                            ></a>

                            <form
                                action="/dashboard/visi-misi/visi/{{$visi->id}}"
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
                                href="/dashboard/visi-misi/visi/{{$visi->id}}"
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
