@extends('layouts.app')

@section('content')

<style>

body{
    background:#f7f8fc;
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
    background:linear-gradient(135deg,#F6D365,#FDA085);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:35px;
    color:white;
    margin-bottom:20px;
}

/* Title */
.page-title{
    font-size:30px;
    font-weight:700;
    color:#444;
}

.page-subtitle{
    color:#888;
    margin-bottom:35px;
}

/* Input */
.form-control{
    border-radius:15px;
    border:2px solid #ececec;
    padding:13px;
    transition:.3s;
}

.form-control:focus{
    border-color:#FDA085;
    box-shadow:0 0 0 .25rem rgba(253,160,133,.25);
}

label{
    font-weight:600;
    margin-bottom:8px;
}

/* Buttons */

.btn-update{
    background:linear-gradient(135deg,#F6D365,#FDA085);
    border:none;
    color:white;
    font-weight:bold;
    border-radius:15px;
    padding:12px 30px;
    transition:.3s;
}

.btn-update:hover{
    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(253,160,133,.35);
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

<div class="col-lg-8">

<div class="edit-card">

<div class="icon-box">
✏️
</div>

<h2 class="page-title">
Edit Kategori
</h2>

<p class="page-subtitle">
Perbarui informasi kategori blog Anda.
</p>

<form action="{{ route('categories.update',$category->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label>Nama Kategori</label>

<input type="text"
name="name"
class="form-control"
value="{{ old('name',$category->name) }}">

@error('name')
<div class="text-danger mt-2">
{{ $message }}
</div>
@enderror

</div>

<div class="mb-4">

<label>Deskripsi</label>

<textarea
name="description"
rows="5"
class="form-control">{{ old('description',$category->description) }}</textarea>

@error('description')
<div class="text-danger mt-2">
{{ $message }}
</div>
@enderror

</div>

<button class="btn btn-update">
💾 Update Kategori
</button>

<a href="{{ route('categories.index') }}" class="btn btn-back">
← Kembali
</a>

</form>

</div>

</div>

</div>

</div>

@endsections