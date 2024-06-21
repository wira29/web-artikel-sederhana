@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="fw-semibold fs-4">
            Halaman Kategori
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-md btn-primary">
            Tambah Kategori
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $categorie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categorie->name }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <div class="">
                                <a href="{{ route('categories.edit', $categorie->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" id="deleteForm">
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
    </table>
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
