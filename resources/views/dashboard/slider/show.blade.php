@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pendaftar Tingkat 2</h1>
<p class="mb-4">
    DataTables is a third party plugin that is used to generate the demo table
    below. For more information about DataTables, please visit the
    <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
</p>

<div class="card">
    <h5 class="card-header">Detail Data Anggota</h5>
    <div class="card-body">
        <h5 class="card-title">ISI</h5>
        <p class="card-text">
        <div class="row">
            <div class="col">{{ $visi->isi }}</div>
        </div>
        </p>
        <a href="/dashboard/slider" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection