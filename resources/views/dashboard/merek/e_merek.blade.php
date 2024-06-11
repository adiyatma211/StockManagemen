@extends('layouts.base')
@section('konten')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard Barang</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Edit Barang
                        </h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama Merek</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="First Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="file-horizontal">LogoMerek</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tipe-horizontal">Tipe Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select multiple class="form-select" id="tipe-horizontal" name="tipe[]"
                                                size="5">
                                                <option value="1">Tipe 1</option>
                                                <option value="2">Tipe 2</option>
                                                <option value="3">Tipe 3</option>
                                                <option value="4">Tipe 4</option>
                                                <option value="5">Tipe 5</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
