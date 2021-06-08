<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="mt-3 ">


    <!---Main Content--->

    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="row">
            <div class="col-auto pt-4" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
            <div class="col-auto ml-3">
                <h2 class="font-weight-bolder text-dark text-center mt-4">Homepage Admin</h2>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-sm-6 col-md-3 text-dark">
                    <div class="card card-stats bg-light card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-book-open fa-3x mt-4"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Buku Yang Terdaftar</p>
                                        <h6 class="card-title"><?= $jumlahBuku; ?></h6>
                                        <a href="<?= base_url("Admin/index") ?>"> Details <i style="margin-left: 10px;" class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 text-dark">
                    <div class="card card-stats bg-light card-round ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="text-center">
                                        <i class="fas fa-user-friends fa-3x mt-4"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Anggota Yang Terdaftar</p>
                                        <h6 class="card-title"><?= $jumlahAnggota; ?></h6>
                                        <a href=<?= base_url("Admin/showListProfile") ?>> Details <i style="margin-left: 10px;" class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 text-dark">
                    <div class="card card-stats bg-light card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="text-center">
                                        <i class="fas fa-retweet fa-3x mt-4"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Peminjaman Belum Selesai</p>
                                        <h6 class="card-title"><?= $jumlahTransaksiBelumSelesai; ?></h6>
                                        <form action=<?= base_url("Admin/listTransaksi") ?> method="post" id="formDetail">
                                            <input type="hidden" name="val" value="false" id="">
                                            <a href="#" id="submitA" onclick="submitForm()"> Details <i style="margin-left: 10px;" class="fas fa-arrow-right"></i></a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 text-dark">
                    <div class="card card-stats bg-light card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="text-center">
                                        <i class="fas fa-check-circle fa-3x mt-4"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Peminjaman Sudah Selesai</p>
                                        <h6 class="card-title"><?= $jumlahTransaksiSelesai; ?></h6>
                                        <form action=<?= base_url("Admin/listTransaksi") ?> method="post" id="formDetail2">
                                            <input type="hidden" name="val" value="true" id="">
                                            <a href="#" id="submitB" onclick="submitForm2()"> Details <i style="margin-left: 10px;" class="fas fa-arrow-right"></i></a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--DaftarDaftar-->
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="card-title text-white">
                                <i class="fas fa-book-open text-white"></i> Daftar Buku Terbaru yang Dipinjam
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <table class="table align-items-center mb-0 ">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>


                                    </tr>

                                    <?php $i = 5 * ($currentPage - 1);
                                    foreach ($buku as $row) :
                                        $i += 1 ?>
                                        <tr>

                                            <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>

                                            <td><span class="text-secondary text-s font-weight-bold"><?= $row['judul']; ?></span></td>


                                        </tr>
                                    <?php endforeach; ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="card-title text-white">
                                <i class="fas fa-user-friends text-white"></i> Daftar Anggota Terbaru
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <table class="table align-items-center mb-0 ">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>


                                    </tr>

                                    <?php $i = 5 * ($currentPage - 1);
                                    foreach ($akun as $row) :
                                        $i += 1 ?>
                                        <tr>

                                            <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>

                                            <td><span class="text-secondary text-s font-weight-bold"><?= $row['email']; ?></span></td>
                                            <td><span class="text-secondary text-s font-weight-bold"><?= $row['namaDepan'] . " " . $row['namaBelakang']; ?></span></td>

                                        </tr>
                                    <?php endforeach; ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mt-4">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="card-title text-white">
                                <i class="fas fa-retweet text-white"></i> Daftar Transaksi Peminjaman Terbaru
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">

                                    <thead class="bg-dark text-white text-center">
                                        <tr>
                                            <th>Tgl. Transaksi</th>
                                            <th>Peminjam</th>
                                            <th>Tgl. Pinjam</th>
                                            <th>Tgl. Kembali</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksiTerbaru as $data) : ?>
                                            <tr>
                                                <td><?= $data['tanggalPinjam']; ?></td>
                                                <td><?= $data['namaDepan'] . " " . $data['namaBelakang']; ?></td>
                                                <td><?= $data['tanggalPinjam']; ?></td>
                                                <td><?= isset($data['tanggalKembali']) ? $data['tanggalKembali'] : "Belum Kembali"; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
</section>

<?= $this->endSection(); ?>