<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="font-weight-bolder text-info text-gradient mt-4">List Buku</h3>
    <form action="<?= base_url('Buku') ?>" method="post">
        <!-- <div class="input-group mb-3">
            <input name='keyword' type="text" class="form-control" placeholder="Masukkan kata kunci yang anda cari.."
                aria-label="Search keyword" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary " type="submit" name="submit" id="button-addon2">Cari</button>
        </div> -->
        <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">

                <input name='keyword' type="text" class="form-control" placeholder="Type here...">
                <button class="btn btn-outline-secondary " type="submit" name="submit" id="button-addon2"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
        </div> -->
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
    <table class="table align-items-center mb-0">
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Penulis</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>

        <?php $i = 10 * ($currentPage - 1);
        foreach ($data as $row) :
            $i += 1 ?>
            <tr>

                <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>
                <td><span class="text-secondary text-s font-weight-bold"><?= $row['judul']; ?></span></td>
                <td><span class="text-s text-secondary font-weight-bold"><?= $row['namaPenulis']; ?></span></td>
                <td><span class="badge badge-sm <?= $row['statusBuku'] == 'Tersedia' ? 'bg-gradient-success' : 'bg-gradient-danger' ?>"><?= $row['statusBuku']; ?></span></td>
                <td><a id="select" class="badge badge-sm bg-info" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $i ?>">
                        <i class="fa fa-eye"></i>Detail</a></td>
                <td>
                    <?php
                    $j = 0;
                    $isbn = [];
                    $carts = isset($carts) ? $carts : [];
                    $rentedBooks = isset($rentedBooks) ? $rentedBooks : [];
                    foreach ($carts as $d) {

                        $isbn[$j] = $d['isbn'];
                        $j++;
                    }

                    $j = 0;
                    $len = count($isbn);
                    foreach ($rentedBooks as $d) {
                        $isbn[($j + $len)] = $d['isbn'];
                        $j++;
                    }




                    if (in_array($row['isbn'], $isbn)) {
                        echo "<button type='submit' class='btn btn-secondary'> <img style='width: 100%; height:100%;'
                        src='/img/plus-lg.svg'> </button>";
                    } else {
                        echo "<form action='Cart/addCart' method='post'>";
                        echo  "<input type='hidden'  name='isbn' value=$row[isbn]>";
                        echo "<button type='submit' class='btn btn-success'> <img style='width: 100%; height:100%;'
                src='/img/plus-lg.svg' > </button>";
                        echo "</form>";
                    } ?>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
    <?= $pager->links('buku', 'my_pagination') ?>

</div>

<?php
$i = 10 * ($currentPage - 1);
foreach ($data as $row) :
    $i += 1 ?>
    <div class="modal fade" id="modal-detail-<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">

                    <table>

                        <tr>
                            <td><img width="300" src="../img/<?= $row['cover'] ?>" alt="<?= $row['judul']; ?>"></td>
                            <td style="padding:40px;">
                                <h6>ISBN : <span class="text-secondary text-s font-weight-normal"><?php echo $row['isbn']; ?></span></h6>
                                <h6>Judul : <span class="text-secondary text-s font-weight-normal"><?php echo $row['judul']; ?></span></h6>
                                <h6>Nama Penulis : <span class="text-secondary text-s font-weight-normal"><?php echo $row['namaPenulis']; ?></span></h6>
                                <h6>Kategori : <span class="text-secondary text-s font-weight-normal"><?php echo $row['namaKategori']; ?></span></h6>
                                <h6>Tahun Terbit : <span class="text-secondary text-s font-weight-normal"><?php echo $row['tahunTerbit']; ?></span></h6>
                                <h6>Status : <span class="text-secondary text-s font-weight-normal"><?php echo $row['statusBuku']; ?></span></h6>

                                <h6>Sinopsis</h6>
                                <p class="text-secondary text-s"><?= $row['sinopsis']; ?></p>
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

<?= $this->endSection(); ?>