<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCert">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="addCert" tabindex="-1" aria-labelledby="addCertLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCertLabel">Tambah Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.about-us.store', collect(Request::segments())->last()) }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Sertifikat</label>
                        <input type="text" class="form-control" name="certificate" id="certificate"
                            aria-describedby="cert" placeholder="Nama Sertifikat">
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
