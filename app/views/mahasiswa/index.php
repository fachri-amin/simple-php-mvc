<div class="row">
    <div class="col-md-6">
        <form method="post" action="<?= BASE_URL ?>mahasiswa/cari">
        <div class="input-group mb-3 col-lg-8">
                <input type="text" class="form-control" placeholder="Cari mahasiswa..." aria-label="Recipient's username" aria-describedby="button-addon2" name="cari">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-10">

        <?php Flasher::flash(); ?>
        
        <h3>Daftar Mahasiswa</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1 ?>
                <?php foreach($data['mahasiswa'] as $mhs): ?>
                <tr>
                    <th scope="row"><?= $count ?></th>
                    <td><?= $mhs['nama_mahasiswa'] ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['email'] ?></td>
                    <td><?= $mhs['jurusan'] ?></td>
                    <td>
                        <a id="btn-edit-mahasiswa" href="" data-toggle="modal" data-target="#formModalEdit" data-url="<?= BASE_URL ?>mahasiswa/getMahasiswa" data-id="<?= $mhs['mahasiswa_id'] ?>"><span class="badge badge-warning">Ubah</span></a>
                        <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= BASE_URL ?>mahasiswa/hapus/<?= $mhs['mahasiswa_id'] ?>"><span class="badge badge-danger">Hapus</span></a>
                    </td>
                </tr>
                <?php  $count++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
        Tambah data mahasiswa
    </button>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah data mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASE_URL ?>mahasiswa/tambah" method='post'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaInput">Nama</label>
                        <input type="text" class="form-control" id="namaInput" name='nama_mahasiswa'>
                    </div>
                    <div class="form-group">
                        <label for="nimInput">NIM</label>
                        <input type="number" class="form-control" id="nimInput" name='nim'>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="email" class="form-control" id="emailInput" name='email'>
                    </div>
                    <div class="form-group">
                        <label for="jurusanInput">Jurusan</label>
                        <select name="jurusan" class="form-control" id="jurusanInput">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Matematika">Matematika</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah data mahasiswa</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="formModalEdit" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit data mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" action="<?= BASE_URL ?>mahasiswa/ubah" method='post'>
                <div class="modal-body">
                    <input type="hidden" name="mahasiswa_id" id="idEdit">
                    <div class="form-group">
                        <label for="namaEdit">Nama</label>
                        <input type="text" class="form-control" id="namaEdit" name='nama_mahasiswa'>
                    </div>
                    <div class="form-group">
                        <label for="nimEdit">NIM</label>
                        <input type="number" class="form-control" id="nimEdit" name='nim'>
                    </div>
                    <div class="form-group">
                        <label for="emailEdit">Email</label>
                        <input type="email" class="form-control" id="emailEdit" name='email'>
                    </div>
                    <div class="form-group">
                        <label for="jurusanEdit">Jurusan</label>
                        <select name="jurusan" class="form-control" id="jurusanEdit">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Matematika">Matematika</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit data mahasiswa</button>
                </div>
            </form>
        </div>
    </div>
</div>
