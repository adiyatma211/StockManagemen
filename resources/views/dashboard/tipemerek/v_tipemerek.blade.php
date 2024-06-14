@extends('layouts.base')
@section('konten')
    <div id="main">
        @include('sweetalert::alert')
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard Tipe Merek</h3>
        </div>

        <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Tabel Tipe Merek
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('index.tipemerek') }}" class="btn btn-primary">Tambah Merek Tipe Merek</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tipe</th>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ShowTipeMerek as $key => $a)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $a->nama_tipe }}</td>
                                            <td>{{ $a->ukuran }}</td>
                                            <td>{{ $a->stok }}</td>
                                            <td>
                                                <div class="mb-3">
                                                    <a href="{{ route('edit.tipemerek', [$a->id]) }}"
                                                        class="btn icon icon-left btn-info"><i data-feather="edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('delete.tipemerek', [$a->id]) }}" method="POST"
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
