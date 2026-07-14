@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HERO --}}
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden mb-5"
        style="background:linear-gradient(135deg,#E3F2FD,#F3E5F5,#E8F5E9);">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background:white;color:#6366F1;font-size:15px;">

                        🚀 TechBlog Dashboard

                    </span>

                    <h1 class="fw-bold display-5">
                        Selamat Datang,
                    </h1>

                    <h2 class="fw-bold text-primary mb-3">
                        {{ Auth::user()->name }}
                    </h2>

                    <p class="text-secondary fs-5">

                        Temukan berbagai artikel menarik seputar teknologi,
                        pemrograman, tutorial, inovasi digital,
                        dan informasi terbaru yang dapat menambah wawasan.

                    </p>

                    <div class="mt-4">

                        <a href="{{ route('articles.create') }}"
                            class="btn btn-primary rounded-pill px-4 py-2 me-2 shadow">

                            ✍️ Tulis Artikel

                        </a>

                        <a href="{{ route('categories.create') }}"
                            class="btn btn-success rounded-pill px-4 py-2 shadow">

                            📂 Tambah Kategori

                        </a>

                    </div>

                </div>

                <div class="col-lg-4 text-center">

                    <div style="font-size:130px;">
                        💻
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <div class="card border-0 shadow rounded-5 h-100"
                style="background:#FFF8E7;">

                <div class="card-body text-center">

                    <div style="font-size:55px;">📝</div>

                    <h5>Total Artikel</h5>

                    <h2 class="fw-bold text-primary">

                        {{ $totalArticles }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-0 shadow rounded-5 h-100"
                style="background:#E8F5E9;">

                <div class="card-body text-center">

                    <div style="font-size:55px;">📂</div>

                    <h5>Total Kategori</h5>

                    <h2 class="fw-bold text-success">

                        {{ $totalCategories }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-0 shadow rounded-5 h-100"
                style="background:#F3E5F5;">

                <div class="card-body text-center">

                    <div style="font-size:55px;">🌍</div>

                    <h5>Dipublikasikan</h5>

                    <h2 class="fw-bold text-danger">

                        {{ $publishedArticles }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-0 shadow rounded-5 h-100"
                style="background:#E3F2FD;">

                <div class="card-body text-center">

                    <div style="font-size:55px;">🚀</div>

                    <h5>TechBlog</h5>

                    <h2 class="fw-bold text-info">

                        Online

                    </h2>

                </div>

            </div>

        </div>

    </div>

    {{-- QUICK MENU --}}
    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <a href="{{ route('articles.create') }}" class="text-decoration-none">

                <div class="card border-0 shadow rounded-5 text-center p-4">

                    <div style="font-size:45px;">✍️</div>

                    <h5 class="mt-3">Tulis Artikel</h5>

                </div>

            </a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('categories.index') }}" class="text-decoration-none">

                <div class="card border-0 shadow rounded-5 text-center p-4">

                    <div style="font-size:45px;">📂</div>

                    <h5 class="mt-3">Kategori</h5>

                </div>

            </a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('blog.index') }}" class="text-decoration-none">

                <div class="card border-0 shadow rounded-5 text-center p-4">

                    <div style="font-size:45px;">🌐</div>

                    <h5 class="mt-3">Lihat Blog</h5>

                </div>

            </a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('profile.edit') }}" class="text-decoration-none">

                <div class="card border-0 shadow rounded-5 text-center p-4">

                    <div style="font-size:45px;">👤</div>

                    <h5 class="mt-3">Profil</h5>

                </div>

            </a>

        </div>

    </div>

    {{-- ARTIKEL DAN KATEGORI --}}
    <div class="row">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-5">

                <div class="card-header bg-white border-0 pt-4">

                    <h4>📰 Artikel Terbaru</h4>

                </div>

                <div class="card-body">

                    @forelse($latestArticles as $article)

                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">

                            <div>

                                <h5 class="mb-1">

                                    {{ $article->title }}

                                </h5>

                                <small class="text-muted">

                                    {{ $article->category->name }}

                                    •

                                    {{ $article->created_at->format('d M Y') }}

                                </small>

                            </div>

                            <a href="{{ route('articles.edit',$article->id) }}"
                                class="btn btn-outline-primary btn-sm">

                                Edit

                            </a>

                        </div>

                    @empty

                        <div class="text-center py-4">

                            Belum ada artikel.

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow rounded-5 mb-4">

                <div class="card-header bg-white border-0 pt-4">

                    <h4>📂 Kategori</h4>

                </div>

                <div class="card-body">

                    @forelse($categories as $category)

                        <span class="badge bg-primary rounded-pill p-3 mb-2">

                            {{ $category->name }}

                        </span>

                    @empty

                        Belum ada kategori.

                    @endforelse

                </div>

            </div>

            <div class="card border-0 shadow rounded-5">

                <div class="card-body">

                    <h5>💡 Tips Hari Ini</h5>

                    <p class="text-muted mb-0">

                        Buat artikel secara rutin, gunakan judul yang menarik,
                        dan pilih kategori yang sesuai agar pembaca lebih mudah
                        menemukan konten Anda.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection