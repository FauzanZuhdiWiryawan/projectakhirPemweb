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
                        <a class="nav-link active" aria-current="true" href="#">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= base_url("Profile/riwayat") ?>>Riwayat Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Biodata</h5>
                <div class="row gx-4">
                    <div class="col-md-2">Nama Depan</div>
                    <div class="col-md-8">: <?= $profile[0]['namaDepan'] ?></div>
                </div>
                <div class="row gx-4">
                    <div class="col-md-2">Nama Belakang</div>
                    <div class="col-md-8">: <?= $profile[0]['namaBelakang'] ?></div>
                </div>
                <div class="row gx-4">
                    <div class="col-md-2">Jenis Kelamin</div>
                    <div class="col-md-8">: <?php if ($profile[0]['jenisKelamin'] == "L") {
                                                echo "Laki-laki";
                                            } else {
                                                echo "Perempuan";
                                            } ?></div>
                </div>
                <div class="row gx-4">
                    <div class="col-md-2">Tanggal Lahir</div>
                    <div class="col-md-8">: <?= $profile[0]['tanggalLahir'] ?></div>
                </div>
                <div class="row gx-4">
                    <div class="col-md-2">Nomor Handphone</div>
                    <div class="col-md-8">: <?= $profile[0]['noHP'] ?></div>
                </div>
                <div class="row gx-4">
                    <div class="col-md-2">Email</div>
                    <div class="col-md-8">: <?= $profile[0]['email'] ?></div>
                </div>
            </div>
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
                                <input name="id" type="hidden" value="<?= $profile[0]['id'] ?>">
                                <label>Nama Depan</label>
                                <div class="mb-3">
                                    <input name="namaDepan" value="<?= $profile[0]['namaDepan'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Belakang</label>
                                <div class="mb-3">
                                    <input name="namaBelakang" value="<?= $profile[0]['namaBelakang'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                                </div>
                            </div>
                        </div>
                        <label>Jenis Kelamin</label>
                        <select name="jenisKelamin" class="form-select" aria-label="Default select example">
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
                            <input name="noHP" value="<?= $profile[0]['noHP'] ?>" type="text" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
                        </div>
                        <label>Tanggal Lahir</label>
                        <div class="mb-3">
                            <input name="tanggalLahir" value="<?= $profile[0]['tanggalLahir'] ?>" type="date" class="form-control" aria-label="isbn" aria-describedby="isbn-addon">
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
</section>

<?= $this->endSection(); ?>