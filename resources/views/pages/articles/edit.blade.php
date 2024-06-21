@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="mb-3">
            Halaman Tambah Artikel
        </h3>
        <div class="">
            <a href="{{ route('articles.index') }}" class="btn btn-md btn-warning">
                Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="exampleFormControlInput1" name="title" value="{{ $article->title }}" placeholder="game">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="exampleFormControlInput1" class="form-label mt-3">Foto</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->photo) }}" style="width: 10%;" alt="" srcset="">
                    </div>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                        id="exampleFormControlInput1" name="photo" placeholder="game">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="exampleFormControlInput1" class="form-label mt-3">Kategori</label>
                    <select name="category_id" class="form-select @error('photo') is-invalid @enderror" aria-label="Default select example">
                        <option selected>Pilih Kategori</option>
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $article->category_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label  class="form-label mt-3">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3">
                        {{$article->description}}
                    </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-md btn-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
@endsection
