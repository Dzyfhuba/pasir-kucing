@extends('admin.layouts.app')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addService">
        Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addService" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceLabel">Tambah Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Nama Layanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Deskripsi Layanan</label>
                            <input type="text" class="form-control" name="description" id="description"
                                aria-describedby="description" placeholder="Deskripsi Layanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="Service" class="form-label">Cover Layanan</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder="Berkas Layanan"
                                aria-describedby="cover" required>
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
                <th>Nama Layanan</th>
                <th>Deskripsi Layanan</th>
                <th>Gambar</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service as $key => $s)
                <tr id="row">
                    <td scope="row">{{ $key + 1 }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->description }}</td>
                    <td><img src="{{ asset('storage/services/' . $s->cover) }}" alt=""></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn icon" data-bs-toggle="modal"
                            data-bs-target="#editServiceModal{{ $key }}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn icon" id="deleteService" data-service="{{ $s->id }}" type="button"
                            class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="top" data-bs-content="Top popover"><i class="fa-solid fa-xmark"></i></button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="editServiceModal{{ $key }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Layanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.service.update', $s->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Layanan</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            aria-describedby="name" placeholder="Nama Layanan" value="{{ $s->name }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Deskripsi Layanan</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            aria-describedby="description" placeholder="Deskripsi Layanan"
                                            value="{{ $s->description }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Service" class="form-label">Cover Layanan</label>
                                        <input type="file" class="form-control" name="cover" id="cover"
                                            placeholder="Berkas Layanan" aria-describedby="cover">
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
