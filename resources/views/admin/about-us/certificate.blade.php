<!-- Button trigger modal -->
<button type="button" class="btn btn-color mb-3" data-bs-toggle="modal" data-bs-target="#addCert">
    Tambah
</button>
<button class="btn icon" id="delete" type="button" class="btn btn-secondary" data-bs-container="body"
    data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover"><i
        class="fa-solid fa-xmark"></i></button>
<!-- Modal -->
<div class="modal fade" id="addCert" tabindex="-1" aria-labelledby="addCertLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCertLabel">Tambah Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.about-us.store', collect(Request::segments())->last()) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Sertifikat</label>
                        <input type="text" class="form-control" name="certificate" id="certificate"
                            aria-describedby="cert" placeholder="Nama Sertifikat" required>
                    </div>
                    <div class="mb-3">
                        <label for="certFile" class="form-label">Berkas Sertifikat</label>
                        <input type="file" class="form-control" name="certFile" id="certFile"
                            placeholder="Berkas Sertifikat" aria-describedby="certFile" required>
                    </div>
                    <button type="submit" class="btn btn-color">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Certificate List --}}
<table class="table" id="datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Sertifikat</th>
            <th>Gambar</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aboutus->certificates as $key => $cert)
            <tr id="row">
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{ $cert }}</td>
                <td><img src="{{ asset('storage/certificates/' . $cert) }}" alt=""></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn icon" data-bs-toggle="modal"
                        data-bs-target="#editCertModal{{ $key }}">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </td>
                <td>
                    <button class="btn icon" id="deleteCert" data-cert="{{ $cert }}" type="button"
                        class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="Top popover"><i class="fa-solid fa-xmark"></i></button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="editCertModal{{ $key }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Sertifikat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.about-us.update', collect(Request::segments())->last()) }}"
                                enctype="multipart/form-data" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="prevCert" value="{{ $cert }}">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Sertifikat</label>
                                    <input type="text" class="form-control" name="certificate" id="certificate"
                                        aria-describedby="cert" placeholder="Nama Sertifikat"
                                        value="{{ $cert }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="certFile" class="form-label">Berkas Sertifikat</label>
                                    <input type="file" class="form-control" name="certFile" id="certFile"
                                        placeholder="Berkas Sertifikat" aria-describedby="certFile">
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
