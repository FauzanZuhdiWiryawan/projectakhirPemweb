<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <?php
    $navbar = isset($navbar) ? $navbar : null;
    if ($navbar == 'none') {
        echo '<div class="row">';
        echo "<div class='col-auto pt-4' style='font-size:30px;cursor:pointer' onclick='openNav()'>&#9776;</div>";
        echo '<div class="col-auto ml-3">';
        echo '<h2 class="font-weight-bolder text-dark text-center mt-4">List Penulis</h2>';
        echo '</div>';
        echo '</div>';
    } else {
        echo " <h3 class='font-weight-bolder text-info text-gradient pt-5'>List Penulis</h3>";
    }
    ?>






    <form action="<?= base_url('Penulis/searchPenulis') ?>" method="get">
        <div class="bg-white border-radius-lg d-flex me-2 my-3">
            <input name='keyword' type="text" class="form-control ps-3" placeholder="Cari di sini...">
            <span class="input-group-btn">
                <button class="btn bg-gradient-info my-1 me-1" type="submit" name="submit" id="button-addon2">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <div class="text-right">
            <?php $navbar = isset($navbar) ? $navbar : null;
            if ($navbar == 'none') {
                echo " <a data-bs-toggle='modal' href=\"#modal-tambah\" class='btn btn-outline-info'>Tambah Data</a>";
            } ?>

        </div>
    </form>

    <div class="row">
        <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">

            <div class="card mt-3 mb-3 card-style">

                <div class="card-body">
                    <div class="row">

                        <?php $i = 10 * ($currentPage - 1);
                        foreach ($data as $row) :
                            $i += 1 ?>
                            <div class="col-lg-4 col-md-6 d-flex flex-column mx-auto">
                                <div class="card card-penulis mb-5">
                                    <div class="row">
                                        <div class="col">
                                            <img id="FotoPenulis" class="imgMenu" src=<?= "/img\/" . $row['fotoPenulis'] ?>>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="MenuHeading"><?= $row['namaPenulis'] ?></h5>

                                        <p> <?= $row['biografi'] ?></p>



                                    </div>
                                    <div class="container">
                                        <div class="d-flex align-items-center mb-3 justify-content-between">
                                            <a class="card-link text-info icon-move-right  " data-bs-toggle="modal" href="#modal-karya-<?= $i ?>">Karya
                                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></a>
                                            <?php $navbar = isset($navbar) ? $navbar : null;
                                            if ($navbar == 'none') {
                                                echo " <a class='card-link text-info icon-move-right text-right  ' data-bs-toggle='modal' href='#modal-edit-$i'>Edit";
                                                echo "<i class='fas fa-pencil-alt text-sm ms-1' aria-hidden='true'></i></a>";
                                            } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>


            </div>



        </div>
    </div>
</div>

<?php
$i = 10 * ($currentPage - 1);
foreach ($data as $row) :
    $i += 1 ?>
    <div class="modal fade" id="modal-karya-<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buku Karya <?php echo $row['namaPenulis'] ?></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="card-group">

                            <div class="card" style="box-shadow: none;">

                                <div class="card-body">
                                    <div class="row">

                                        <?php $j = 0;

                                        foreach ($row['judul'] as $judul) : ?>
                                            <div class="col-lg-4 col-md-6 d-flex flex-column mx-auto">
                                                <div class="card">
                                                    <img class="imgMenu" src="..\img\<?= $judul['cover'] ?>" alt="<?= $judul['judul'] ?>">
                                                    <div class="card-body text-centre">
                                                        <p><?= $judul['judul'] ?></p>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php endforeach; ?>
<?php
$i = 10 * ($currentPage - 1);

foreach ($data as $row) :
    $i += 1 ?>
    <div class="modal fade" id="modal-edit-<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Penulis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Penulis/editPenulisProcess') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="idPenulis" value=<?= $row['idPenulis'] ?> id="">
                        <div class="mb-3">
                            <label for="exampleInputISBN" class="form-label">Nama Penulis</label>
                            <input name="namaPenulis" type="text" class="form-control" id="exampleInputISBN" value="<?= $row['namaPenulis'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCover" class="form-label">Foto Profil</label>
                            <input name="fotoPenulis" type="file" class="form-control" id="exampleInputCover" value="<?= "/img\/" . $row['fotoPenulis'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCover" class="form-label">Biografi</label>
                            <textarea name="biografi" type="text" class="form-control" id="exampleInputCover">Beliau adalah seorang penulis yang memulai karirnya dengan menulis buku gambar</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-info">Save changes</button>
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
                <h5 class="modal-title">Tambah Penulis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Penulis/addPenulisProcess') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputISBN" class="form-label">Nama Penulis</label>
                        <input name="namaPenulis" type="text" class="form-control" id="exampleInputISBN">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCover" class="form-label">Foto Penulis</label>
                        <input name="fotoPenulis" type="file" class="form-control" id="exampleInputCover">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputJudul" class="form-label">Biografi</label>
                        <textarea name="biografi" type="text" class="form-control" id="exampleInputCover"></textarea>
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