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
                            <label for="category" class="form-label">Kategoru</label>
                            <select class="form-control" name="category" id="category">
                                <option value="" hidden disabled>Pilih Kategori</option>
                                @foreach ($categories as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Portfolio</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Nama Portfolio" required>
                        </div>
                        <div class="mb-3">
                            <label for="date">Start</label>
                            <input id="date" name="date" class="form-control" type="date" />
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Klien</label>
                            <select class="form-control" name="client" id="client">
                                <option value="" hidden disabled @selected(true)>Pilih Klien</option>
                                @foreach ($clients as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
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
                            <small id="video" class="form-text text-muted"><a
                                    href="{{ asset('storage/decoration/embedvideo.png') }}">Cara input video</a></small>
                        </div>
                        <button type="submit" class="btn btn-color">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Service List --}}
    <table class="table" id="datatable" style="width: 100%">
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
                    <td>
                        @foreach (json_decode($s->images) as $key => $image)
                            <a href="{{ $image }}" target="_blank">image ke {{ $key + 1 }}</a>
                        @endforeach
                    </td>
                    <td>{!! $s->video !!}</td>
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
                                        <label for="category" class="form-label">Kategoru</label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="" hidden disabled @selected($s->category->name == '')>Pilih Kategori
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($s->category->name == $category->name)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Portfolio</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            aria-describedby="name" placeholder="Nama Portfolio"
                                            value="{{ $s->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date">Start</label>
                                        <input id="date" name="date" class="form-control" type="date"
                                            value="{{ $s->date }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="client" class="form-label">Klien</label>
                                        <select class="form-control" name="client" id="client">
                                            <option value="" hidden disabled>Pilih Klien</option>
                                            @foreach ($clients as $c)
                                                <option value="{{ $c->id }}" @selected($s->category->name == $c->name)>
                                                    {{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Deskripsi Portfolio</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            aria-describedby="description" placeholder="Deskripsi Portfolio"
                                            value="{{ $s->description }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Gambar</label>
                                        <input type="text" class="form-control" name="images" id="images"
                                            aria-describedby="images" placeholder="Gambar"
                                            value="@foreach (json_decode($s->images) as $image) {{ $image }}, @endforeach">
                                        <small id="images" class="form-text text-muted">Cantumkan url gambar, pisahkan
                                            dengan koma untuk
                                            mencantumkan beberapa url gambar sekaligus.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="video" class="form-label">Video</label>
                                        <input type="text" class="form-control" name="video" id="video"
                                            aria-describedby="video" placeholder="Video" value="{{ $s->video }}">
                                        <small id="video" class="form-text text-muted"><a
                                                href="{{ asset('storage/decoration/embedvideo.png') }}">Cara input
                                                video</a></small>
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
