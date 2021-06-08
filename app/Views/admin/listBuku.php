<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="row">
            <div class="col-auto pt-4" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
            <div class="col-auto ml-3">
                <h2 class="font-weight-bolder text-dark text-center mt-4">List Buku</h2>
            </div>
        </div>

        <form action="<?= base_url('Admin/searchBook') ?>" method="get">
            <div class="col">
                <div class="bg-white border-radius-lg d-flex me-2 my-3">
                    <input name='keyword' type="text" class="form-control ps-3" placeholder="Cari di sini...">
                    <span class="input-group-btn">
                        <button class="btn bg-gradient-info my-1 me-1" type="submit" name="submit" id="button-addon2">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>

        <table class="table align-items-center mb-0 ">
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Terbit</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pengarang</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Genre Buku</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th></th>

            </tr>

            <?php $i = 10 * ($currentPage - 1);
            foreach ($data as $row) :
                $i += 1 ?>
                <tr>

                    <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>
                    <td><?= $row['isbn'] ?></span></td>
                    <td><span class="text-secondary text-s font-weight-bold"><?= $row['judul']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['tahunTerbit']; ?></span></td>
                    <td><span class="text-xs text-secondary font-weight-bold"><?= $row['namaPenulis']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['namaKategori'] ?></span></td>
                    <td><span class="badge badge-sm <?= $row['statusBuku'] == 'Tersedia' ? 'bg-gradient-success' : 'bg-gradient-danger' ?>"><?= $row['statusBuku']; ?></span></td>
                    <td>
                        <div class="d-flex justify-content-between ">
                            <div class="col"><a data-bs-toggle="modal" href="#modal-edit-<?= $i ?>" class="btn btn-link text-dark px-3 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a></div>
                            <div class="col"> <a href="<?= base_url('Admin/deleteBuku/' . $row['isbn']) ?>" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"><i class="far fa-trash-alt me-2"></i>Delete</a></div>
                        </div>


                    </td>

                </tr>
            <?php endforeach; ?>

        </table>

        <div class="d-flex justify-content-between ">
            <div> <?= $pager->links('buku', 'my_pagination') ?></div>
            <div><a data-bs-toggle="modal" href="#modal-tambah" class="btn btn-primary">Tambah Data</a></div>
        </div>
        <br>


    </div>
    <?php
    $i = 10 * ($currentPage - 1);
    foreach ($data as $row) :
        $i += 1 ?>
        <div class="modal fade" id="modal-edit-<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Admin/editDataProcess') ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputISBN" class="form-label">ISBN</label>
                                <input name="isbn" type="text" class="form-control" id="exampleInputISBN" value="<?= $row['isbn'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputCover" class="form-label">Cover</label>
                                <input name="cover" type="file" class="form-control" id="exampleInputCover" value="<?= $row['cover'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputJudul" class="form-label">Judul</label>
                                <input name="judul" type="text" class="form-control" id="exampleInputJudul" value="<?= $row['judul'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTahunTerbit" class="form-label">Tahun Terbit</label>
                                <input name="tahunTerbit" type="text" class="form-control" id="exampleInputTahunTerbit" value="<?= $row['tahunTerbit'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputNamaPenulis" class="form-label">Nama Penulis</label>
                                <select name="namaPenulis" class="form-select" id="inputGroupSelect01" required>
                                    <option selected><?= $row['namaPenulis'] ?>
                                    </option>
                                    <?php foreach ($penulis as $x) : ?>
                                        <option value="<?= $x['namaPenulis'] ?>"><?= $x['namaPenulis'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputGenre" class="form-label">Kategori Buku</label>

                                <select name="namaKategori" class="form-select" id="inputGroupSelect01" required>
                                    <option selected><?= $row['namaKategori'] ?>
                                    </option>
                                    <?php foreach ($kategori as $x) : ?>
                                        <option value="<?= $x['namaKategori']; ?>"><?= $x['namaKategori'] ?></option>

                                    <?php endforeach; ?>
                                </select>


                            </div>
                            <div class="mb-3">
                                <label for="exampleInputStatus" class="form-label">Status Buku</label>
                                <input name="statusBuku" type="text" class="form-control" id="exampleInputStatus" value="<?= $row['statusBuku'] ?>" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

    <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/addDataProcess') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputISBN" class="form-label">ISBN</label>
                            <input name="isbn" type="text" class="form-control" id="exampleInputISBN" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCover" class="form-label">Cover</label>
                            <input name="cover" type="file" class="form-control" id="exampleInputCover" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputJudul" class="form-label">Judul</label>
                            <input name="judul" type="text" class="form-control" id="exampleInputJudul" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTahunTerbit" class="form-label">Tahun Terbit</label>
                            <input name="tahunTerbit" type="text" class="form-control" id="exampleInputTahunTerbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNamaPenulis" class="form-label">Nama Penulis</label>
                            <select name="namaPenulis" class="form-select" id="inputGroupSelect01" required>
                                <option selected>
                                </option>
                                <?php foreach ($penulis as $x) : ?>
                                    <option value="<?= $x['namaPenulis'] ?>"><?= $x['namaPenulis'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputGenre" class="form-label">Kategori Buku</label>

                            <select name="namaKategori" class="form-select" id="inputGroupSelect01" required>
                                <option selected>
                                </option>
                                <?php foreach ($kategori as $x) : ?>
                                    <option value="<?= $x['namaKategori']; ?>"><?= $x['namaKategori'] ?></option>

                                <?php endforeach; ?>
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Status Buku</label>
                            <input name="statusBuku" type="text" class="form-control" id="exampleInputStatus" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>