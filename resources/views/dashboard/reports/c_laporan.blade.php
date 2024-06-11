@extends('layouts.base')
@section('konten')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3>Dashboard Tambah Laporan</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Managemen Stok
                        </h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama PIC</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="First Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="First Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Stok Awal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Stok Masuk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Stok Keluar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Stok Total</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Tanggal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                name="fname" placeholder="09-06-2024">
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
        </div>
    </div>
    </section>
    </div>
@endsection
