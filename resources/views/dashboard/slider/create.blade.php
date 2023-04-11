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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Form Visi
            <a href="/dashboard/slider" class="btn btn-sm btn-danger float-end"
                >Batal</a
            >
        </h6>
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <h1></h1>
            <form
                method="post"
                action="/dashboard/slider"
                class="my-3"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input
                        type="text"
                        class="form-control @error('judul') is-invalid @enderror"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        name="judul"
                    />
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea
                        class="form-control @error('caption') is-invalid @enderror"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        name="caption"
                    ></textarea>
                    @error('caption')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                    <input
                        class="form-control @error('image') is-invalid @enderror"
                        type="file"
                        name="image"
                        id="image"
                        onchange="previewImage()"
                    />
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
@endsection
