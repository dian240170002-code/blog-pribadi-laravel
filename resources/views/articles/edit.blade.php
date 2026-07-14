@extends('layouts.app')

@section('content')

<style>

body{
    background:#f8f9fd;
}

/* Card */
.edit-card{
    background:#fff;
    border-radius:25px;
    padding:40px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* Icon */
.icon-box{
    width:75px;
    height:75px;
    border-radius:20px;
    background:linear-gradient(135deg,#84FAB0,#8FD3F4);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:35px;
    color:white;
    margin-bottom:20px;
}

/* Title */
.page-title{
    font-size:32px;
    font-weight:700;
    color:#444;
}

.page-subtitle{
    color:#888;
    margin-bottom:35px;
}

/* Label */
.form-label{
    font-weight:600;
    color:#555;
    margin-bottom:8px;
}

/* Input */
.form-control,
.form-select{
    border-radius:15px;
    border:2px solid #ececec;
    padding:13px;
    transition:.3s;
}

.form-control:focus,
.form-select:focus{
    border-color:#84FAB0;
    box-shadow:0 0 0 .25rem rgba(132,250,176,.25);
}

/* Thumbnail */
.preview-img{
    width:220px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
    margin-bottom:15px;
}

/* Button */
.btn-update{
    background:linear-gradient(135deg,#84FAB0,#8FD3F4);
    color:white;
    border:none;
    font-weight:bold;
    border-radius:15px;
    padding:12px 30px;
    transition:.3s;
}

.btn-update:hover{
    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(143,211,244,.35);
}

.btn-back{
    background:#eef2f7;
    color:#555;
    border:none;
    border-radius:15px;
    padding:12px 30px;
    font-weight:bold;
}

.btn-back:hover{
    background:#dde4ec;
}

</style>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="edit-card">

<div class="icon-box">
📝
</div>

<h2 class="page-title">
Edit Artikel
</h2>

<p class="page-subtitle">
Perbarui artikel yang telah Anda buat.
</p>

<form action="{{ route('articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-4">

<label class="form-label">
Judul Artikel
</label>

<input
type="text"
name="title"
class="form-control"
value="{{ old('title',$article->title) }}">

</div>

<div class="mb-4">

<label class="form-label">
Kategori
</label>

<select name="category_id" class="form-select">

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ $article->category_id == $category->id ? 'selected' : '' }}>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label class="form-label">
Thumbnail Saat Ini
</label>

<br>

@if($article->thumbnail)

<img
src="{{ asset('storage/'.$article->thumbnail) }}"
class="preview-img">

@endif

<input
type="file"
name="thumbnail"
class="form-control">

</div>

<div class="mb-4">

<label class="form-label">
Isi Artikel
</label>

<textarea
name="content"
rows="10"
class="form-control">{{ old('content',$article->content) }}</textarea>

</div>

<div class="mb-4">

<label class="form-label">
Status
</label>

<select name="status" class="form-select">

<option value="draft"
{{ $article->status=='draft' ? 'selected':'' }}>
Draft
</option>

<option value="published"
{{ $article->status=='published' ? 'selected':'' }}>
Published
</option>

</select>

</div>

<button class="btn btn-update">
💾 Update Artikel
</button>

<a href="{{ route('articles.index') }}" class="btn btn-back">
← Kembali
</a>

</form>

</div>

</div>

</div>

</div>

@endsection