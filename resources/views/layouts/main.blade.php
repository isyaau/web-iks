<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        <!-- Bootstrap CSS -->
        <!-- <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        /> -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        />
        <link rel="stylesheet" href="/assets/css/style.css" />

        <title>Website Pendaftaran Warga IKS</title>
    </head>
    <body>
        <!-- Start Navbar -->
        @include('partials.navbar')
        <!-- End Navbar -->

        @yield('container')

        <!-- Strat Footer -->
        @include('partials.footer')
        <!-- End Footer -->

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script> -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        <script>
            const toastLiveExample = document.getElementById("liveToast");
            const toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
        </script>
    </body>
</html>
