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
                            <form class="form form-horizontal" method="POST" action="{{ route('simpan.laporan') }}">
                                @csrf
                                <input type="text" id="stok-awal-hidden" name="stok_awal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama PIC</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama-pic" class="form-control" name="user_id"
                                                value="{{ auth()->user()->name }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama-barang">Nama Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="nama-barang" class="form-select" name="tipemerek_id">
                                                <option selected disabled>Pilih Nama Barang</option>
                                                @foreach ($ShowTipeMerek as $tipeMerek)
                                                    <option value="{{ $tipeMerek->id }}" data-stok="{{ $tipeMerek->stok }}">
                                                        {{ $tipeMerek->nama_tipe }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <label for="stok-awal">Stok Awal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stok-awal" placeholder="Pilih Barang Dulu"
                                                class="form-control" value="{{ $tipeMerek->stok }}" readonly>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label for="stok-awal">Stok Awal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stok-awal" placeholder="Pilih Barang Dulu"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-masuk">Stok Masuk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stok-masuk" class="form-control" name="stok_masuk"
                                                placeholder="0" value="0">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-keluar">Stok Keluar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stok-keluar" class="form-control" name="stok_keluar"
                                                placeholder="0" value="0">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stok-total">Stok Total</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stok-total" class="form-control" name="stok_total"
                                                placeholder="0" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Tanggal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tanggal" class="form-control" name="tanggal_hari"
                                                value="{{ now()->format('d-m-Y') }}">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var defaultStokAwal = parseFloat('{{ $tipeMerek->stok }}') ||
                0; // Ambil stok_awal dari data yang pertama kali dimuat

            // Event listener saat dropdown nama-barang berubah
            document.getElementById('nama-barang').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var stokAwal = parseFloat(selectedOption.getAttribute('data-stok')) || 0;

                // Set nilai input stok-awal atau tampilkan placeholder
                if (selectedOption.value !== '') {
                    document.getElementById('stok-awal').value = stokAwal;
                } else {
                    document.getElementById('stok-awal').placeholder = "Pilih Barang Dulu";
                    document.getElementById('stok-awal').value = '';
                }

                // Calculate total stock if needed
                calculateTotalStock();
            });

            // Function untuk menghitung total stock
            function calculateTotalStock() {
                var stokAwal = parseFloat(document.getElementById('stok-awal').value) || 0;
                var stokMasuk = parseFloat(document.getElementById('stok-masuk').value) || 0;
                var stokKeluar = parseFloat(document.getElementById('stok-keluar').value) || 0;
                var stokTotal = stokAwal + stokMasuk - stokKeluar;
                document.getElementById('stok-total').value = stokTotal;
            }

            // Event listener untuk input stok-masuk dan stok-keluar
            document.getElementById('stok-masuk').addEventListener('input', calculateTotalStock);
            document.getElementById('stok-keluar').addEventListener('input', calculateTotalStock);
        });
    </script>
@endsection
