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
                            Tabel Barang
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('index.merek') }}" class="btn btn-primary">Tambah Merek Barang</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Nama Tipe</th>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Graiden</td>
                                        <td>vehicula.aliquet@semconsequat.co.uk</td>
                                        <td>076 4820 8838</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <div class="mb-3">
                                                <a href="{{ route('edit.merek') }}" class="btn icon icon-left btn-info"><i
                                                        data-feather="edit"></i> Edit</a>
                                                <a href="#" class="btn icon icon-left btn-danger"><i
                                                        data-feather="alert-circle"></i>
                                                    Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
