@extends('admin.layouts.app')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addPortfolio">
        Tambah
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addPortfolio" tabindex="-1" aria-labelledby="addPortfolioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPortfolioLabel">Tambah Portfolio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Portfolio</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Nama Portfolio" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Deskripsi Portfolio</label>
                            <input type="text" class="form-control" name="description" id="description"
                                aria-describedby="description" placeholder="Deskripsi Portfolio" required>
                        </div>
                        <div class="mb-3">
                            <label for="date">Start</label>
                            <input id="date" name="date" class="form-control" type="date" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Klien</label>
                            <input type="text" class="form-control" name="client" id="client" aria-describedby="client"
                                placeholder="Klien" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Deskripsi Portfolio</label>
                            <input type="text" class="form-control" name="description" id="description"
                                aria-describedby="description" placeholder="Deskripsi Portfolio" required>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Gambar</label>
                            <input type="text" class="form-control" name="images" id="images" aria-describedby="images"
                                placeholder="Gambar">
                            <small id="images" class="form-text text-muted">Cantumkan url gambar, pisahkan dengan koma untuk
                                mencantumkan beberapa url gambar sekaligus.</small>
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video</label>
                            <input type="text" class="form-control" name="video" id="video" aria-describedby="video"
                                placeholder="Video">
                            <small id="video" class="form-text text-muted">Cantumkan url video, kolom ini hanya dapat memuat
                                satu url video saja.</small>
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
                <th>Kategoru</th>
                <th>Nama Portfolio</th>
                <th>Tanggal</th>
                <th>Klien</th>
                <th>Deskripsi Portfolio</th>
                <th>Gambar</th>
                <th>Video</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $key => $s)
                <tr id="row">
                    <td scope="row">{{ $key + 1 }}</td>
                    <td>{{ $s->category->name }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->date }}</td>
                    <td>{{ $s->client->name }}</td>
                    <td>{{ $s->description }}</td>
                    <td><img src="{{ asset('storage/Portfolios/' . $s->cover) }}" alt=""></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn icon" data-bs-toggle="modal"
                            data-bs-target="#editPortfolioModal{{ $key }}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('admin.portfolio.destroy', $s->id) }}" method="post">
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
                <div class="modal fade" id="editPortfolioModal{{ $key }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.portfolio.update', $s->id) }}"
                                    enctype="multipart/form-data" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Portfolio</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            aria-describedby="name" placeholder="Nama Portfolio" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Deskripsi Portfolio</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            aria-describedby="description" placeholder="Deskripsi Portfolio" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date">Start</label>
                                        <input id="date" name="date" class="form-control" type="date" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Klien</label>
                                        <input type="text" class="form-control" name="client" id="client"
                                            aria-describedby="client" placeholder="Klien" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Deskripsi Portfolio</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            aria-describedby="description" placeholder="Deskripsi Portfolio" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Gambar</label>
                                        <input type="text" class="form-control" name="images" id="images"
                                            aria-describedby="images" placeholder="Gambar">
                                        <small id="images" class="form-text text-muted">Cantumkan url gambar, pisahkan
                                            dengan koma untuk
                                            mencantumkan beberapa url gambar sekaligus.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="video" class="form-label">Video</label>
                                        <input type="text" class="form-control" name="video" id="video"
                                            aria-describedby="video" placeholder="Video">
                                        <small id="video" class="form-text text-muted">Cantumkan url video, kolom ini hanya
                                            dapat memuat
                                            satu url video saja.</small>
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
