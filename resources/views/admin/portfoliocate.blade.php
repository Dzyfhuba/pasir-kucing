@extends('admin.layouts.app')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addPortfolioCate">
        Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addPortfolioCate" tabindex="-1" aria-labelledby="addPortfolioCateLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPortfolioCateLabel">Tambah Kategori Portfolio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.portfoliocate.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori Portfolio</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Nama Kategori Portfolio" required>
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
                <th>Kategori Portfolio</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolioCates as $key => $s)
                <tr id="row">
                    <td scope="row">{{ $key + 1 }}</td>
                    <td>{{ $s->name }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn icon" data-bs-toggle="modal"
                            data-bs-target="#editPortfolioCateModal{{ $key }}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        {{-- form delete --}}
                        <form action="{{ route('admin.portfoliocate.destroy', $s->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn icon"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="editPortfolioCateModal{{ $key }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Portfolio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{-- form update --}}
                                <form action="{{ route('admin.portfoliocate.update', $s->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kategori Portfolio</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            aria-describedby="name" placeholder="Nama Kategori Portfolio"
                                            value="{{ $s->name }}" required>
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
