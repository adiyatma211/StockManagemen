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
                                        <th>Gambar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showTipeMerek as $key => $a)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $a->nama }}</td>
                                            <td>{{ $a->TipeMerek->nama_tipe }}</td>
                                            <td>{{ $a->gambarimage }}</td>
                                            <td>
                                                <div class="mb-3">
                                                    <a href="{{ route('edit.merek', [$a->id]) }}"
                                                        class="btn icon icon-left btn-info">
                                                        <i data-feather="edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('delete.merek', [$a->id]) }}" method="POST"
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
    </div>
@endsection
