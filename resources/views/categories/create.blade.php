@extends('layouts.app')

@section('content')

<style>

body{
    background:#f7f9fc;
}

/* Card */
.category-card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    border:none;
}

/* Header */
.page-title{
    font-size:32px;
    font-weight:700;
    color:#5b4b8a;
}

.page-desc{
    color:#8b8b8b;
    margin-bottom:30px;
}

/* Label */
.form-label{
    font-weight:600;
    color:#555;
    margin-bottom:8px;
}

/* Input */
.form-control{
    border-radius:15px;
    border:2px solid #ececec;
    padding:13px;
    transition:.3s;
}

.form-control:focus{
    border-color:#a78bfa;
    box-shadow:0 0 0 .25rem rgba(167,139,250,.25);
}

/* Button Simpan */
.btn-save{
    background:linear-gradient(45deg,#8EC5FC,#A18CD1);
    color:white;
    border:none;
    border-radius:15px;
    padding:10px 28px;
    font-weight:bold;
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
    color:white;
    box-shadow:0 10px 20px rgba(0,0,0,.15);
}

/* Button Kembali */
.btn-back{
    background:#f1f5f9;
    color:#555;
    border:none;
    border-radius:15px;
    padding:10px 28px;
    font-weight:bold;
    transition:.3s;
}

.btn-back:hover{
    background:#e2e8f0;
}

/* Icon Box */
.icon-box{
    width:70px;
    height:70px;
    background:linear-gradient(45deg,#FBC2EB,#A6C1EE);
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:34px;
    margin-bottom:20px;
}

</style>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="category-card">

                <div class="icon-box">
                    📂
                </div>

                <h2 class="page-title">
                    Tambah Kategori
                </h2>

                <p class="page-desc">
                    Tambahkan kategori baru agar artikel blog lebih rapi dan mudah dikelompokkan.
                </p>

                <form action="{{ route('categories.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label">
                            Nama Kategori
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Masukkan nama kategori..."
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control"
                            placeholder="Masukkan deskripsi kategori...">{{ old('description') }}</textarea>

                        @error('description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-save">
                        💾 Simpan
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