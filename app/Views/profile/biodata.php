<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section>
    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="card card body mb-3 mt-7 p-4">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar-xxl position-relative">
                        <img src="<?= "/img\/" . $profile[0]['profilePicture'] ?>" alt="Foto Profil" class="w-100 border-radius-lg shadow-sm">
                        <a class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2" type="button" data-bs-toggle="modal" data-bs-target="#profilePictureModal"> <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                            </i></a>
                    </div>
                </div>
                <div class="col-md-10 me-sm-0 mx-auto">
                    <h5 class="card-title"><?= $profile[0]['namaDepan'] . " " . $profile[0]['namaBelakang'] . "'s" ?> Profile</h5>
                    <p class="card-text">"I never dreamed about success, I worked for it." -Estee Lauder</p>
                    <p class="text-right"><button type="button" class="btn bg-gradient-info w-15 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile</button></p>
                </div>
            </div>
        </div>
        <div class="card text-left mt-2 mb-8">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href=<?= base_url("Profile") ?>>Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Riwayat Transaksi</a>
                    </li>
                </ul>
            </div>
            <ul class="list-group">
                <?php foreach ($transaksi as $data) : ?>

                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-lg"><?= $data['judul']; ?></h6>
                            <span class="mb-2 text-sm">Tanggal Pinjam: <span class="text-dark font-weight-bold ms-2"><?= $data['tanggalPinjam']; ?></span></span>
                            <span class="mb-2 text-sm">Tanggal Wajib Kembali: <span class="text-dark ms-2 font-weight-bold"><?= $data['tanggalWajibKembali']; ?></span></span>
                            <span class="text-sm">Tanggal Kembali: <span class="text-dark ms-2 font-weight-bold"><?= $data['tanggalKembali']; ?></span></span>
                        </div>
                        <div class="ms-auto">

                            <a class="badge badge-sm bg-info" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $data['idTransaksi'] ?>">
                                <i class="fa fa-eye me-2"></i>Detail</a>


                        </div>
                    </li>

                <?php endforeach; ?>


            </ul>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action=<?= base_url("Profile/update"); ?> method="post" role="form text-left">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <input name='id' type="hidden" value="<?= $profile[0]['id'] ?>">
                                <label>Nama Depan</label>
                                <div class="mb-3">
                                    <input name='namaDepan' value="<?= $profile[0]['namaDepan'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Belakang</label>
                                <div class="mb-3">
                                    <input name='namaBelakang' value="<?= $profile[0]['namaBelakang'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                                </div>
                            </div>
                        </div>
                        <label>Jenis Kelamin</label>
                        <select name='jenisKelamin' class="form-select" aria-label="Default select example">
                            <option selected><?php if ($profile[0]['jenisKelamin'] == "L") {
                                                    echo "Laki-laki";
                                                } else {
                                                    echo "Perempuan";
                                                } ?></option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <label>Nomor Handphone</label>
                        <div class="mb-3">
                            <input name='noHP' value="<?= $profile[0]['noHP'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                        </div>
                        <label>Tanggal Lahir</label>
                        <div class="mb-3">
                            <input name='tanggalLahir' value="<?= $profile[0]['tanggalLahir'] ?>" type="date" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-info ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=<?= base_url("Profile/update") ?> method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <div class="d-flex justify-content-center">
                                <img src="<?= "/img\/" . $profile[0]['profilePicture'] ?>" class=" img-fluid border-radius-lg" alt="">
                            </div>
                        </div>

                        <div class="card-body pt-2">
                            <input name="profilePicture" type="file" class="form-control" id="exampleInputProfilePicture" value="<?= isset($profile[0]['profilePicture']) ? $profile[0]['profilePicture'] : "" ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value="Upload Image" class="btn bg-gradient-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    foreach ($transaksi as $data) : ?>
        <div class="modal fade" id="modal-detail-<?= $data['idTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <input type="hidden" name="isbn" value=<?= $data['isbn'] ?>>
                <input type="hidden" name="idTransaksi" value=<?= $data['idTransaksi'] ?>>

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table>
                            <tr>
                                <td><img width="300" src="../img/<?= $data['cover'] ?>" alt="<?= $data['judul']; ?>"></td>
                                <td style="padding:40px;">
                                    <h5>Informasi Buku</h5>
                                    <h6>ISBN : <span class="text-secondary text-s font-weight-normal"><?php echo $data['isbn']; ?></span></h6>
                                    <h6>Judul : <span class="text-secondary text-s font-weight-normal"><?php echo $data['judul']; ?></span></h6>
                                    <h6>Kategori : <span class="text-secondary text-s font-weight-normal"><?php echo $data['namaKategori']; ?></span></h6>
                                    <br>
                                    <h5>Informasi Peminjaman</h5>
                                    <h6>Tanggal Pinjam: <span class="text-secondary text-s font-weight-normal"><?= $data['tanggalPinjam']; ?></span></h6>
                                    <h6>Tanggal Wajib Kembali: <span class="text-secondary text-s font-weight-normal"><?= $data['tanggalWajibKembali']; ?></span></h6>
                                    <h6>Tanggal Kembali: <span class="text-secondary text-s font-weight-normal"><?= $data['tanggalKembali']; ?></span></h6>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</section>
<?= $this->endSection(); ?>