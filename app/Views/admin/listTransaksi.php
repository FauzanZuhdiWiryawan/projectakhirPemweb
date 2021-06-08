<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">


    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="row">
            <div class="col-auto pt-4" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
            <div class="col-auto ml-3">
                <h2 class="font-weight-bolder text-dark text-center mt-4">List Transaksi</h2>
            </div>
        </div>

        <form action="<?= base_url('Admin/searchTransaksi') ?>" method="get">
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buku yang Dipinjam</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pinjam</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Wajib Kembali</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Kembali</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th></th>

            </tr>

            <?php $i = 5 * ($currentPage - 1);
            foreach ($data as $row) :
                $i += 1 ?>
                <tr>

                    <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>

                    <td><span class="text-secondary text-s font-weight-bold"><?= $row['namaDepan'] . " " . $row['namaBelakang']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['email']; ?></span></td>
                    <td><span class="text-xs text-secondary font-weight-bold"><?= $row['isbn']; ?></span></td>
                    <td><span class="text-xs text-secondary font-weight-bold"><?= $row['judul']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['tanggalPinjam'] ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['tanggalWajibKembali'] ?></span></td>
                    <td><span class="text-secondary text-xs"><?php if ($row['tanggalKembali'] == null) {
                                                                    echo "-";
                                                                } else {
                                                                    echo $row['tanggalKembali'];
                                                                } ?></span></td>
                    <td><span class="text text-xs <?= $row['tanggalKembali'] == null ? 'badge bg-gradient-danger' : 'badge bg-gradient-success' ?>"><?php if ($row['tanggalKembali'] == null) {
                                                                                                                                                        echo "Belum Selesai";
                                                                                                                                                    } else {
                                                                                                                                                        echo "Selesai";
                                                                                                                                                    } ?></span></td>

                    <td>
                        <div class=" col"> <a href="<?= base_url('Admin/deleteTransaksi/' . $row['id']) ?>" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"><i class="far fa-trash-alt me-2"></i>Delete</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>

        </table>
        <div class="row ">
            <div class="col-6">
                <div class="d-flex flex-row">
                    <?= $pager->links('transaksi', 'my_pagination') ?>
                </div>
            </div>
            <div class="col-6 mt-3 d-flex flex-row-reverse">
                <div class="flex-gap">
                    <form action=<?= base_url("Admin/listTransaksi") ?> method="post">
                        <input type="hidden" name="val" value="false" id="">
                        <button class="btn btn-danger"> Belum Selesai</button>
                    </form>

                    <form action=<?= base_url("Admin/listTransaksi") ?> method="post">
                        <input type="hidden" name="val" value="true" id="">
                        <button type="submit" class="btn btn-success">Selesai</button>
                    </form>



                </div>

            </div>
        </div>


        <br>


    </div>



    <?= $this->endSection(); ?>