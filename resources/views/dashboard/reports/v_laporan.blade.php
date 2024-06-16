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
                                    @foreach ($ShowLaporan as $key => $a)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $a->user->name }}</td>
                                            <td>{{ $a->tipeMerek->nama_tipe }}</td>
                                            <td>{{ $a->stok_awal }}</td>
                                            <td>{{ $a->stok_masuk }}</td>
                                            <td>{{ $a->stok_keluar }}</td>
                                            <td>{{ $a->stok_total }}</td>
                                            <td>{{ $a->tanggal_hari }}</td>
                                            <td>
                                                <div class="mb-3">
                                                    <a href="{{ route('edit.laporan', [$a->id]) }}"
                                                        class="btn icon icon-left btn-info"><i data-feather="edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('delete.laporan', [$a->id]) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn icon icon-left btn-danger"
                                                            data-confirm-delete="true">
                                                            <i data-feather="alert-circle"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
