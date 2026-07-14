@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4"
        style="background: linear-gradient(135deg,#FFE5EC,#E3F2FD,#E8F5E9);">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">
                    📂 Daftar Kategori
                </h2>

                <p class="text-muted mb-0">
                    Kelola seluruh kategori blog Anda.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
               class="btn btn-primary rounded-pill px-4">

                ➕ Tambah Kategori

            </a>

        </div>

    </div>

    {{-- Pesan Berhasil --}}
    @if(session('success'))

        <div class="alert alert-success rounded-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- Tabel --}}
    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead style="background:#E3F2FD;">

                        <tr>

                            <th width="70">No</th>

                            <th>Nama Kategori</th>

                            <th>Slug</th>

                            <th>Deskripsi</th>

                            <th width="180" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $index => $category)

                        <tr>

                            <td>{{ $index+1 }}</td>

                            <td>

                                <span class="fw-bold">

                                    📁 {{ $category->name }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-info text-dark rounded-pill">

                                    {{ $category->slug }}

                                </span>

                            </td>

                            <td>

                                {{ $category->description }}

                            </td>

                            <td class="text-center">

                                <a href="{{ route('categories.edit',$category->id) }}"
                                   class="btn btn-warning btn-sm rounded-pill">

                                    ✏ Edit

                                </a>

                                <form action="{{ route('categories.destroy',$category->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus kategori?')"
                                        class="btn btn-danger btn-sm rounded-pill">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5">

                                <div class="text-center py-5">

                                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                         width="120">

                                    <h5 class="mt-3">

                                        Belum ada kategori

                                    </h5>

                                    <p class="text-muted">

                                        Silakan tambahkan kategori pertama Anda.

                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection