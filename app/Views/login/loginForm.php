<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-7">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang!</h3>
                            <p class="mb-0">Masukkan e-mail dan kata sandi untuk masuk</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" action="<?= base_url('Login/login_process'); ?>" method="POST">
                                <label>E-mail</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" aria-label="Email" aria-describedby="email-addon">
                                </div>
                                <label>Kata sandi</label>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Kata sandi" aria-label="Password" aria-describedby="password-addon">
                                </div>
                                <!-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Ingat saya</label>
                  </div> -->
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Belum punya akun?
                                <a data-bs-toggle="modal" href="#modal-registrasi" class="text-info text-gradient font-weight-bold">Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image: linear-gradient(310deg, #2152FF, #21D4FD);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-registrasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Mari Bergabung</h3>
                        <p class="mb-0">Silakan isi form di bawah untuk bergabung dengan kami!</p>
                    </div>
                    <div class="card-body ">
                        <form role="form text-center" action=<?= base_url("Login/daftar") ?> method="Post">


                            <div class="input-group row mb-3 mx-auto">
                                <label>Nama</label>
                                <div class="col-md">
                                    <input name="namaDepan" type="text" class="form-control" placeholder="Nama Depan" aria-label="namaDepan" aria-describedby="namaDepan-addon" required>
                                </div>
                                <div class="col-md">
                                    <input name="namaBelakang" type="text" class="form-control" placeholder="Nama Belakang" aria-label="namaBelakang" aria-describedby="namaBelakang-addon" required>
                                </div>
                            </div>

                            <div class="input-group row mb-3 mx-auto">
                                <label>Jenis Kelamin</label>
                                <div class="col">
                                    <select name="jenisKelamin" id="jenisKelamin" class="form-control" aria-label="jenisKelamin" aria-describedby="jenisKelamin-addon" required>
                                        <option value="" disabled hidden data-default selected>Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group row mb-3 mx-auto">
                                <label>Email</label>
                                <div class="col">
                                    <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                                </div>
                            </div>

                            <div class="input-group row mb-3 mx-auto">
                                <label>Password</label>
                                <div class="col">
                                    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                                </div>
                            </div>

                            <div class="input-group row mb-3 mx-auto">
                                <label>Nomor HP</label>
                                <div class="col">
                                    <input name="noHP" type="text" class="form-control" placeholder="Nomor HP" aria-label="noHP" aria-describedby="noHP-addon" required>
                                </div>
                            </div>

                            <div class="input-group row mb-3 mx-auto">
                                <label>Tanggal Lahir</label>
                                <div class="col">
                                    <input name="tanggalLahir" type="date" class="form-control" aria-label="tanggalLahir" aria-describedby="tanggalLahir-addon" required>
                                </div>
                            </div>
                            <input type="hidden" name="profilePicture" value="profile.jpg" id="">
                            <div class="input-group row mx-auto">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">DAFTAR</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>