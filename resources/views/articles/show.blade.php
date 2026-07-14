@extends('layouts.app')

@section('content')

<style>

body{
    background:#f8f9fd;
}

.article-card{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.article-header{
    background:linear-gradient(135deg,#A1C4FD,#C2E9FB);
    padding:40px;
    color:#333;
}

.article-title{
    font-size:36px;
    font-weight:700;
}

.article-meta{
    margin-top:15px;
    color:#555;
}

.article-body{
    padding:35px;
}

.article-body img{
    max-width:100%;
    border-radius:15px;
}

.thumbnail{
    width:100%;
    height:420px;
    object-fit:cover;
}

.badge-status{
    padding:8px 18px;
    border-radius:20px;
    font-size:14px;
}

.btn-back{
    border-radius:15px;
    padding:10px 28px;
    background:#eef2f7;
    border:none;
    color:#444;
    font-weight:bold;
}

.btn-edit{
    border-radius:15px;
    padding:10px 28px;
    background:linear-gradient(135deg,#84FAB0,#8FD3F4);
    color:white;
    border:none;
    font-weight:bold;
}

.btn-edit:hover{
    color:white;
}

.info-box{
    background:#f8f9ff;
    border-radius:15px;
    padding:18px;
    margin-bottom:25px;
}

</style>

<div class="container py-5">

<div class="article-card">

    <div class="article-header">

        <h1 class="article-title">
            {{ $article->title }}
        </h1>

        <div class="article-meta">

            👤 <strong>Penulis :</strong>
            {{ $article->user->name ?? '-' }}

            &nbsp;&nbsp;|&nbsp;&nbsp;

            📂 <strong>Kategori :</strong>
            {{ $article->category->name }}

            &nbsp;&nbsp;|&nbsp;&nbsp;

            📅 {{ $article->created_at->format('d F Y') }}

        </div>

    </div>

    @if($article->thumbnail)

    <img
        src="{{ asset('storage/'.$article->thumbnail) }}"
        class="thumbnail">

    @endif

    <div class="article-body">

        <div class="info-box">

            <strong>Status :</strong>

            @if($article->status=='published')

                <span class="badge bg-success badge-status">
                    Published
                </span>

            @else

                <span class="badge bg-warning text-dark badge-status">
                    Draft
                </span>

            @endif

        </div>

        <div style="line-height:2; font-size:17px; text-align:justify;">

            {!! nl2br(e($article->content)) !!}

        </div>

        <hr class="my-4">

        <a href="{{ route('articles.index') }}"
            class="btn btn-back">

            ← Kembali

        </a>

        <a href="{{ route('articles.edit',$article->id) }}"
            class="btn btn-edit">

            ✏️ Edit Artikel

        </a>

    </div>

</div>

</div>

@endsection