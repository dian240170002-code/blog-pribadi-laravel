@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Detail Artikel -->
    <div class="card shadow-lg border-0 rounded-4 mb-5">

        @if($article->thumbnail)
            <img src="{{ asset('storage/'.$article->thumbnail) }}"
                class="card-img-top rounded-top-4"
                style="max-height:400px; object-fit:cover;">
        @endif

        <div class="card-body p-4">

            <h2 class="fw-bold mb-3">
                {{ $article->title }}
            </h2>

            <div class="mb-3 text-muted">
                📂 <strong>Kategori:</strong>
                {{ $article->category->name }}
            </div>

            <hr>

            <div class="fs-5" style="line-height: 1.9;">
                {!! nl2br(e($article->content)) !!}
            </div>

            <a href="{{ route('blog.index') }}"
                class="btn btn-secondary mt-4">

                ← Kembali

            </a>

        </div>

    </div>

    <!-- Form Komentar -->
    <div class="card shadow border-0 rounded-4 mb-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                💬 Tinggalkan Komentar
            </h4>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <form action="{{ route('comments.store', $article->id) }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Nama

                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Email (Opsional)

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Komentar

                    </label>

                    <textarea
                        name="comment"
                        rows="4"
                        class="form-control"
                        required></textarea>

                </div>

                <button class="btn btn-primary">

                    Kirim Komentar

                </button>

            </form>

        </div>

    </div>

    <!-- Daftar Komentar -->
    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-light">

            <h4 class="mb-0">

                💬 Semua Komentar
                ({{ $article->comments->count() }})

            </h4>

        </div>

        <div class="card-body">

            @forelse($article->comments as $comment)

                <div class="border rounded-3 p-3 mb-3">

                    <div class="d-flex justify-content-between">

                        <strong>

                            👤 {{ $comment->name }}

                        </strong>

                        <small class="text-muted">

                            {{ $comment->created_at->format('d M Y H:i') }}

                        </small>

                    </div>

                    @if($comment->email)

                        <small class="text-muted">

                            {{ $comment->email }}

                        </small>

                    @endif

                    <p class="mt-3 mb-0">

                        {{ $comment->comment }}

                    </p>

                </div>

            @empty

                <div class="alert alert-light text-center">

                    Belum ada komentar.

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection