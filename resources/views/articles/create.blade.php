@extends('layouts.app')

@section('content')

<style>

body{
    background:#f8f9fd;
}

/* Card */
.article-card{
    background:#fff;
    border-radius:25px;
    padding:40px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* Header */
.page-title{
    font-size:32px;
    font-weight:700;
    color:#5B4B8A;
}

.page-subtitle{
    color:#888;
    margin-bottom:35px;
}

/* Icon */
.icon-box{
    width:75px;
    height:75px;
    border-radius:20px;
    background:linear-gradient(135deg,#A18CD1,#FBC2EB);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:35px;
    color:white;
    margin-bottom:20px;
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
    border-color:#A18CD1;
    box-shadow:0 0 0 .25rem rgba(161,140,209,.25);
}

/* File Upload */
.form-control[type=file]{
    padding:12px;
}

/* Button */
.btn-save{
    background:linear-gradient(135deg,#89F7FE,#66A6FF);
    border:none;
    color:white;
    font-weight:bold;
    border-radius:15px;
    padding:12px 30px;
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(102,166,255,.35);
}

.btn-back{
    background:#edf2f7;
    color:#555;
    border-radius:15px;
    padding:12px 28px;
    font-weight:bold;
    border:none;
}

.btn-back:hover{
    background:#dfe7ef;
}

</style>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="article-card">

<div class="icon-box">
✍️
</div>

<h2 class="page-title">
Tulis Artikel Baru
</h2>

<p class="page-subtitle">
Bagikan ide dan cerita terbaikmu kepada pembaca.
</p>

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-4">

<label class="form-label">
Judul Artikel
</label>

<input type="text"
name="title"
class="form-control"
placeholder="Masukkan judul artikel..."
value="{{ old('title') }}">

@error('title')
<div class="text-danger mt-1">{{ $message }}</div>
@enderror

</div>

<div class="mb-4">

<label class="form-label">
Kategori
</label>

<select name="category_id" class="form-select">

<option value="">-- Pilih Kategori --</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach

</select>

@error('category_id')
<div class="text-danger mt-1">{{ $message }}</div>
@enderror

</div>

<div class="mb-4">

<label class="form-label">
Thumbnail
</label>

<input type="file"
name="thumbnail"
class="form-control">

@error('thumbnail')
<div class="text-danger mt-1">{{ $message }}</div>
@enderror

</div>

<div class="mb-4">

<label class="form-label">
Isi Artikel
</label>

<textarea
name="content"
rows="10"
class="form-control"
placeholder="Tulis isi artikel di sini...">{{ old('content') }}</textarea>

@error('content')
<div class="text-danger mt-1">{{ $message }}</div>
@enderror

</div>

<div class="mb-4">

<label class="form-label">
Status
</label>

<select name="status" class="form-select">

<option value="draft">
Draft
</option>

<option value="published">
Published
</option>

</select>

</div>

<button class="btn btn-save">
💾 Simpan Artikel
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