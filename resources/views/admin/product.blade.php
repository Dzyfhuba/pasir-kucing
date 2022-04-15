@extends('admin.layouts.app')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
    Tambah
</button>
<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Nama Produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Deskripsi Produk</label>
                        <input type="text" class="form-control" name="description" id="description" aria-describedby="description" placeholder="Deskripsi Produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="Product" class="form-label">Cover Produk</label>
                        <input type="file" class="form-control" name="cover" id="cover" placeholder="Berkas Produk" aria-describedby="cover" required>
                    </div>
                    <button type="submit" class="btn btn-color">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Cervice List --}}
<table class="table" id="datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi Produk</th>
            <th>Gambar</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $s)
        <tr id="row">
            <td scope="row">{{ $key + 1 }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->description }}</td>
            <td><img src="{{ asset('storage/products/' . $s->cover) }}" alt=""></td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn icon" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $key }}">
                    <i class="fa-solid fa-pen"></i>
                </button>
            </td>
            <td>
                <form action="{{ route('admin.product.destroy', $s->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn icon" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="editProductModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.product.update', $s->id) }}" enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Nama Produk" value="{{ $s->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Deskripsi Produk</label>
                                <input type="text" class="form-control" name="description" id="description" aria-describedby="description" placeholder="Deskripsi Produk" value="{{ $s->description }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="Product" class="form-label">Cover Produk</label>
                                <input type="file" class="form-control" name="cover" id="cover" placeholder="Berkas Produk" aria-describedby="cover">
                            </div>
                            <button type="submit" class="btn btn-color">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection