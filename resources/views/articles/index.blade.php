@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="card border-0 shadow-lg rounded-5 mb-4"
        style="background:linear-gradient(135deg,#E3F2FD,#F3E5F5,#E8F5E9);">

        <div class="card-body d-flex justify-content-between align-items-center p-4">

            <div>

                <h2 class="fw-bold mb-2">
                    📝 Manajemen Artikel
                </h2>

                <p class="text-muted mb-0">
                    Kelola seluruh artikel blog teknologi Anda.
                </p>

            </div>

            <a href="{{ route('articles.create') }}"
                class="btn btn-primary rounded-pill px-4">

                ➕ Tulis Artikel

            </a>

        </div>

    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif

    {{-- Tabel --}}
    <div class="card border-0 shadow rounded-5">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Thumbnail</th>

                            <th>Judul</th>

                            <th>Kategori</th>

                            <th>Status</th>

                            <th>Tanggal</th>

                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($articles as $article)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                @if($article->thumbnail)

                                    <img src="{{ asset('storage/'.$article->thumbnail) }}"
                                        width="80"
                                        height="60"
                                        class="rounded-3"
                                        style="object-fit:cover;">

                                @else

                                    <span class="text-muted">
                                        Tidak ada
                                    </span>

                                @endif

                            </td>

                            <td>

                                <strong>

                                    {{ $article->title }}

                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-info">

                                    {{ $article->category->name }}

                                </span>

                            </td>

                            <td>

                                @if($article->status=='published')

                                    <span class="badge bg-success">

                                        Published

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        Draft

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $article->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <a href="{{ route('articles.show',$article->id) }}"
                                    class="btn btn-sm btn-info text-white rounded-pill">

                                    Detail

                                </a>

                                <a href="{{ route('articles.edit',$article->id) }}"
                                    class="btn btn-sm btn-warning rounded-pill">

                                    Edit

                                </a>

                                <form action="{{ route('articles.destroy',$article->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger rounded-pill"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7">

                                <div class="text-center py-5">

                                    <h4>📄</h4>

                                    <p class="text-muted">

                                        Belum ada artikel.

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