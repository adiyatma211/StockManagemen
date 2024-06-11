@extends('layouts.base')
@section('konten')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard Laporan</h3>
        </div>

        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Laporan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('index.laporan') }}" class="btn btn-primary">Tambah Laporan</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name PIC</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Awal</th>
                                        <th>Stok Masuk</th>
                                        <th>Stok Keluar</th>
                                        <th>Stok total</th>
                                        <th>Tanggal </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Rezha</td>
                                        <td>Kintakunk</td>
                                        <td>45</td>
                                        <td>20</td>
                                        <td>10</td>
                                        <td>15</td>
                                        <td>09-06-2024</td>
                                        <td>
                                            <div class="mb-3">
                                                <a href="{{ route('edit.laporan') }}" class="btn icon icon-left btn-info"><i
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
