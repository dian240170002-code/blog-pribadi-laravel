@extends('layouts.app')

@section('content')

<style>

body{
    background:linear-gradient(135deg,#FFF4F6,#F6F5FF,#EEF9FF);
    min-height:100vh;
}

.hero{
    background:linear-gradient(135deg,#FFD6E8,#D9F2FF,#E5D9FF);
    border-radius:25px;
    padding:60px;
    text-align:center;
    margin-bottom:40px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.hero h1{
    font-size:48px;
    font-weight:bold;
    color:#6D4C7D;
}

.hero p{
    color:#666;
    font-size:18px;
}

.search-box{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    margin-bottom:40px;
}

.blog-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    transition:.35s;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    background:white;
}

.blog-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.blog-card img{
    height:230px;
    object-fit:cover;
}

.title{
    color:#6A4E77;
    font-weight:bold;
}

.badge-soft{
    background:#F7E7FF;
    color:#7B4A9E;
    padding:8px 14px;
    border-radius:50px;
    margin-right:5px;
    font-size:13px;
}

.btn-pastel{
    background:#B8E8FC;
    color:#444;
    border:none;
    border-radius:30px;
    padding:10px 25px;
    font-weight:bold;
}

.btn-pastel:hover{
    background:#8FD3FE;
    color:white;
}

</style>

<div class="container py-5">

<div class="hero">

<h1>🌸 Blog Pribadi 🌸</h1>

<p>
Temukan berbagai artikel menarik seputar teknologi,
pemrograman, dan informasi terbaru.
</p>

</div>

<div class="search-box">

<form action="{{ route('blog.index') }}" method="GET">

<div class="row">

<div class="col-md-5">

<input
type="text"
name="search"
class="form-control form-control-lg"
placeholder="🔍 Cari artikel..."
value="{{ request('search') }}">

</div>

<div class="col-md-4">

<select
name="category"
class="form-select form-select-lg">

<option value="">Semua Kategori</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ request('category')==$category->id?'selected':'' }}>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<button class="btn btn-pastel w-100">

Cari Artikel

</button>

</div>

</div>

</form>

</div>

<div class="row">

@forelse($articles as $article)

<div class="col-md-6 mb-4">

<div class="card blog-card">

@if($article->thumbnail)

<img src="{{ asset('storage/'.$article->thumbnail) }}">

@endif

<div class="card-body">

<h3 class="title">

{{ $article->title }}

</h3>

<div class="mb-3">

<span class="badge-soft">

👤 {{ $article->user->name }}

</span>

<span class="badge-soft">

📂 {{ $article->category->name }}

</span>

<span class="badge-soft">

📅 {{ $article->created_at->format('d M Y') }}

</span>

</div>

<p class="text-muted">

{{ Str::limit(strip_tags($article->content),160) }}

</p>

<a
href="{{ route('blog.show',$article->slug) }}"
class="btn btn-pastel">

Baca Selengkapnya →

</a>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning text-center">

Belum ada artikel dipublikasikan.

</div>

</div>

@endforelse

</div>

</div>

@endsection