@extends('admin.layouts.app')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addClient">
        Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClientLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Klien</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Klien" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Deskripsi</label>
                            <label for="" class="form-label"></label>
                            <select class="form-control" name="clientcate_id" id="clientcate_id">
                                <option disable hidden>Pilih salah satu</option>
                                @foreach ($clientcates as $clientcate)
                                    <option value="{{ $clientcate->id }}">{{ $clientcate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Client" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Berkas"
                                aria-describedby="logo" required>
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
                <th>Jenis Klien</th>
                <th>Klien</th>
                <th>Gambar</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $key => $c)
                <tr id="row">
                    <td scope="row">{{ $key + 1 }}</td>
                    <td>{{ $c->clientcate_name }}</td>
                    <td>{{ $c->name }}</td>
                    <td><img src="{{ asset('storage/clients/' . $c->logo) }}" alt=""></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn icon" data-bs-toggle="modal"
                            data-bs-target="#editClientModal{{ $key }}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        {{-- form delete --}}
                        <form action="{{ route('admin.client.destroy', $c->id) }}" method="post">
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
                <div class="modal fade" id="editClientModal{{ $key }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.client.update', $c->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="prev_logo" value="{{ $c->logo }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Klien</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            aria-describedby="name" placeholder="Klien" value="{{ $c->name }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Deskripsi</label>
                                        <label for="" class="form-label"></label>
                                        <select class="form-control" name="clientcate_id" id="clientcate_id">
                                            @foreach ($clientcates as $clientcate)
                                                <option value="{{ $clientcate->id }}"
                                                    {{ $clientcate->name == $c->clientcate_name ? ' selected' : '' }}>
                                                    {{ $clientcate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Client" class="form-label">Logo</label>
                                        <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo"
                                            aria-describedby="logo">
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
