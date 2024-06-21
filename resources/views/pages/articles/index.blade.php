@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="fw-semibold fs-4">
            Halaman Artikel
        </div>
        <a href="{{ route('articles.create') }}" class="btn btn-md btn-primary">
            Tambah Artikel
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" class="text-center">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td class="text-center"> <img src="{{ asset('storage/' . $article->photo) }}" style="width:20%;" alt="" srcset=""></td>
                    <td>
                        <div class="d-flex gap-3">
                            <div class="">
                                <a href="{{ route('articles.show', $article->id) }}"
                                    class="btn btn-sm btn-warning">Detail</a>
                            </div>
                            <div class="">
                                <a href="{{ route('articles.edit', $article->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete()">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    @endsection
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
