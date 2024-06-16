@extends('layouts.base')
@section('konten')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3>Dashboard Edit Laporan</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Managemen Edit Laporan dan Stock
                        </h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST"
                                action="{{ route('update.laporan', [$showLaporan->id]) }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama PIC</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama-pic" class="form-control" name="user_id"
                                                value="{{ auth()->user()->name }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama-barang">Nama Barang Tersimpan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control"
                                                value="{{ $showLaporan->tipeMerek->nama_tipe }}" disabled>
                                            <input type="hidden" id="tipemerek_id" name="tipemerek_id"
                                                value="{{ $showLaporan->tipeMerek->id }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-awal">Stok Awal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stok-awal" class="form-control"
                                                value="{{ $showLaporan->stok_awal }}" disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-masuk">Stok Masuk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stok-masuk" class="form-control" name="stok_masuk"
                                                placeholder="0" value="{{ $showLaporan->stok_masuk }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-keluar">Stok Keluar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stok-keluar" class="form-control" name="stok_keluar"
                                                placeholder="0" value="{{ $showLaporan->stok_keluar }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stok-total">Stok Total</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stok-total" class="form-control" name="stok_total"
                                                placeholder="0" value="{{ $showLaporan->stok_total }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Tanggal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="hidden" id="tanggal_hari_hidden" name="tanggal_hari"
                                                value="{{ $showLaporan->tanggal_hari }}">
                                            <input type="text" id="tanggal_hari" class="form-control"
                                                value="{{ $showLaporan->tanggal_hari }}" readonly>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stokAwal = parseFloat('{{ $showLaporan->stok_awal }}') || 0;
            var stokMasukInput = document.getElementById('stok-masuk');
            var stokKeluarInput = document.getElementById('stok-keluar');
            var stokTotalInput = document.getElementById('stok-total');

            // Menghitung stok total awal
            calculateStokTotal();

            // Event listener untuk perhitungan stok total saat stok masuk atau keluar berubah
            stokMasukInput.addEventListener('keyup', function() {
                calculateStokTotal();
            });

            stokKeluarInput.addEventListener('keyup', function() {
                calculateStokTotal();
            });

            // Fungsi untuk menghitung stok total
            function calculateStokTotal() {
                var stokMasuk = parseFloat(stokMasukInput.value) || 0;
                var stokKeluar = parseFloat(stokKeluarInput.value) || 0;
                var stokTotal = stokAwal + stokMasuk - stokKeluar;
                stokTotalInput.value = stokTotal; // Menggunakan toFixed(2) untuk menampilkan 2 desimal
            }
        });
    </script>
@endsection
