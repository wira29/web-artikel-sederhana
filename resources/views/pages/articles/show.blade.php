@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="mb-3">
            Halaman Detail Artikel
        </h3>
        <div class="">
            <a href="{{ route('articles.index') }}" class="btn btn-md btn-warning">
                Kembali
            </a>
        </div>
    </div>
    <div class="card text-center">
        <div class="card-header">
          Artikel
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $article->title }}</h5>
          <p class="card-text">{{ $article->description }}</p>
          <div href="#">
            <img src="{{ asset('storage/' . $article->photo) }}"  class="border border-2 border-primary rounded-3" style="width: 10%" alt="" srcset="">
          </div>
        </div>
        <div class="card-footer text-body-secondary">
          {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('D MMMM YYYY')}}
        </div>
      </div>
@endsection
