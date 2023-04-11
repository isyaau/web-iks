<!-- @format -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Panel Admin Web IKS PI</title>
        <link
            rel="apple-touch-icon"
            sizes="180"
            href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32"
            href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16"
            href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiyuQNMG-QHIXh45K4cybgoGtxuhTCNdQXL3x4GHL4D48EJ-D_2NIJRIstArog8uQRDLukwKK2s2maqDnt-FjRoMYk_qvkDWmh2hU7P3F1q31EOXiqbg0Ke79fbDcyAdYujtesj0NLcNkx4v5LyM3v6JLr6tK1S2-cPfOTEmjeIRnZZHbDSqRQsKYjwdQ/s1008/logo-kera-sakti.png"
        />
        <link rel="manifest" href="/site.webmanifest" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <!-- Bootsrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        />
        <!-- Custom fonts for this template -->
        <link
            href="/assets/vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />

        <!-- Custom styles for this template -->
        <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet" />

        <!-- Custom styles for this page -->
        <link
            href="/assets/vendor/datatables/dataTables.bootstrap4.min.css"
            rel="stylesheet"
        />

        <link
            rel="stylesheet"
            type="text/css"
            href="https://unpkg.com/trix@2.0.0/dist/trix.css"
        />
        <script
            type="text/javascript"
            src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"
        ></script>
        <style>
            trix-toolbar [data-trix-button-group="file-tools"] {
                display: none;
            }
        </style>
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            @include('dashboard.partials.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    @include('dashboard.partials.topbar')
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">@yield('container')</div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('dashboard.partials.footer')
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ready to Leave?
                        </h5>
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Select "Logout" below if you are ready to end your
                        current session.
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("trix-file-accept", function (e) {
                e.preventDefault();
            });
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        <!-- Bootstrap core JavaScript-->
        <script src="/assets/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- <script src="/assets/vendor/chart.js/Chart.min.js"></script> -->

        <!-- Custom scripts for all pages-->
        <script src="/assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/assets/js/demo/datatables-demo.js"></script>
        <script src="/assets/js/demo/chart-pie-demo.js"></script>
    </body>
</html>
