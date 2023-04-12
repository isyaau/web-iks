@extends('dashboard.layouts.main') @section('container')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    @if (session()->has('success'))
    <div class="d-flex justify-content-end">
        <div
            class="alert alert-success alert-dismissible fade show col-lg-12"
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
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                        >
                            Tingkat 1 (Warga)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $jumlahTingkat1 }} Orang
                        </div>
                        <p style="font-size: 10px">
                            {{ $jumlahTingkat1verif }} Terverifikasi /
                            {{ $jumlahTingkat1noverif }} Belum Terverifikasi
                        </p>
                    </div>
                    <div class="col-auto">
                        <i
                            class="bi bi-people-fill"
                            style="font-size: 2rem"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-danger text-uppercase mb-1"
                        >
                            Tingkat 2 (Pendekar)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $jumlahTingkat2 }} Orang
                        </div>
                        <p style="font-size: 10px">
                            {{ $jumlahTingkat2verif }} Terverifikasi /
                            {{ $jumlahTingkat2noverif }} Belum Terverifikasi
                        </p>
                    </div>
                    <div class="col-auto">
                        <i
                            class="bi bi-people-fill"
                            style="font-size: 2rem"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-info text-uppercase mb-1"
                        >
                            Total Pendaftar
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div
                                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                >
                                    {{ $jumlahAnggota }} Orang
                                </div>
                                <p style="font-size: 10px">
                                    {{ $jumlahAnggotaverif }} Terverifikasi /
                                    {{ $jumlahAnggotanoverif }} Belum
                                    Terverifikasi
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i
                            class="bi bi-people-fill"
                            style="font-size: 2rem"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->role==1)
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div
                            class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                        >
                            Akun
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $jumlahAkun }} Akun
                        </div>
                    </div>
                    <div class="col-auto">
                        <i
                            class="bi bi-person-fill-gear"
                            style="font-size: 2rem"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else @endif

<!-- Content Row -->

<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    Pendaftar Masuk Baru
                </h6>
                <div class="dropdown no-arrow">
                    <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i
                            class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                        ></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink"
                    >
                        <div class="dropdown-header">Anggota:</div>
                        <a
                            class="dropdown-item"
                            href="/dashboard/anggota/anggota-tk-1"
                            >Tingkat 1</a
                        >
                        <a
                            class="dropdown-item"
                            href="/dashboard/anggota/anggota-tk-1"
                            >Tingkat 2</a
                        >
                    </div>
                </div>
            </div>
            <!-- Card Body -->
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
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tingkat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tingkat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pendaftarAnggota as $anggota)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->alamat }}</td>
                                <td>
                                    @if( $anggota->tingkat==1)
                                    <span
                                        class="badge rounded-pill text-bg-primary"
                                        >Warga</span
                                    >
                                    @elseif( $anggota->tingkat==2)
                                    <span
                                        class="badge rounded-pill text-bg-danger"
                                        >Pendekar</span
                                    >

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    Pendaftar Masuk
                </h6>
                <div class="dropdown no-arrow">
                    <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i
                            class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                        ></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink"
                    >
                        <div class="dropdown-header">Anggota:</div>
                        <a
                            class="dropdown-item"
                            href="/dashboard/anggota/anggota-tk-1"
                            >Tingkat 1</a
                        >
                        <a
                            class="dropdown-item"
                            href="/dashboard/anggota/anggota-tk-1"
                            >Tingkat 2</a
                        >
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="Pendaftar"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Tingkat 1 ({{
                            $jumlahTingkat1
                        }}
                        Warga)
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Tingkat 2 ({{
                            $jumlahTingkat2
                        }}
                        Pendekar)
                    </span>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    Pendaftar Terverifikasi
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="Verifikasi"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Terverifikasi
                        ({{ $jumlahAnggotaverif }}
                        Pendaftar)
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-seccondary"></i> Belum
                        Terverifikasi ({{ $jumlahAnggotanoverif }}
                        Pendaftar)
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/vendor/chart.js/Chart.min.js"></script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = "#858796";

    // Pie Chart Example
    var ctx = document.getElementById("Pendaftar");
    var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Tingkat 1", "Tingkat 2"],
            datasets: [
                {
                    data: [{{ $jumlahTingkat1 }}, {{ $jumlahTingkat2 }}],
                    backgroundColor: ["#4e73df", "#d0181d", "#36b9cc"],
                    hoverBackgroundColor: ["#2e59d9", "#FF0005", "#2c9faf"],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            cutoutPercentage: 80,
        },
    });
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = "#858796";

    // Pie Chart Example
    var ctx = document.getElementById("Verifikasi");
    var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Terverifikasi", "Belum Terverifikasi"],
            datasets: [
                {
                    data: [{{ $jumlahAnggotaverif }}, {{ $jumlahAnggotanoverif }}],
                    backgroundColor: ["#bf292f", "#504e4e", "#36b9cc"],
                    hoverBackgroundColor: ["#f30710", "#1a1a1a", "#2c9faf"],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            cutoutPercentage: 80,
        },
    });
</script>
@endsection
