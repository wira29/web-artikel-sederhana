@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="mb-3">
            Halaman Tambah Kategori
        </h3>
        <div class="">
            <a href="{{ route('categories.index') }}" class="btn btn-md btn-warning">
                Kembali
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="exampleFormControlInput1" name="name" placeholder="game">
                    @error('name')
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
