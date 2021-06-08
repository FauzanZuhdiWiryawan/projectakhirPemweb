<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="font-weight-bolder text-info text-gradient mt-4">Transaksi Buku</h3>


    <ul class="list-group">
        <?php foreach ($transaksi as $data) : ?>

            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column">
                    <h6 class="mb-3 text-lg"><?= $data['judul']; ?></h6>
                    <span class="mb-2 text-sm">Tanggal Pinjam: <span class="text-dark font-weight-bold ms-2"><?= $data['tanggalPinjam']; ?></span></span>
                    <span class="mb-2 text-sm">Tanggal Wajib Kembali: <span class="text-dark ms-2 font-weight-bold"><?= $data['tanggalWajibKembali']; ?></span></span>
                    <span class="text-sm">VAT Number: <span class="text-dark ms-2 font-weight-bold">FRB<?= mt_rand(000000, 999999); ?></span></span>
                </div>
                <div class="ms-auto">

                    <input type="hidden" name="isbn" value=<?= $data['isbn'] ?>>
                    <input type="hidden" name="idTransaksi" value=<?= $data['idTransaksi'] ?>>
                    <a data-bs-toggle="modal" href="#modal-detail-<?= $data['idTransaksi'] ?>" class="btn bg-gradient-info px-3 mb-0">Kembalikan</a>

                </div>
            </li>

        <?php endforeach; ?>


    </ul>
</div>

<?php
foreach ($transaksi as $data) : ?>
    <div class="modal fade" id="modal-detail-<?= $data['idTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form action="<?= base_url("Transaksi/completeTransaksi") ?>" method="POST">
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
                                    <h6>Tanggal Kembali: <span class="text-secondary text-s font-weight-normal">-</span></h6>
                                    <br>
                                    <p class="text-secondary text-s">Apakah anda yakin untuk mengembalikan buku <span class="text-dark font-weight-bold"><?php echo $data['judul']; ?></span> hari ini (<span class="text-dark font-weight-bold"><?php echo date("Y-m-d"); ?></span>)?</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-info">Kembalikan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>