<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">


    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="row">
            <div class="col-auto pt-4" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
            <div class="col-auto ml-3">
                <h2 class="font-weight-bolder text-dark text-center mt-4">List Profil Pengguna</h2>
            </div>
        </div>

        <form action="<?= base_url('Admin/searchProfile') ?>" method="get">
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no HP</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mendaftar pada</th>
                <th></th>

            </tr>

            <?php $i = 5 * ($currentPage - 1);
            foreach ($data as $row) :
                $i += 1 ?>
                <tr>

                    <td><span class="text-xs text-secondary mb-0"><?= $i; ?></span></td>

                    <td><span class="text-secondary text-s font-weight-bold"><?= $row['namaDepan'] . " " . $row['namaBelakang']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?php if ($row['jenisKelamin'] == "L") {
                                                                    echo "Laki-laki";
                                                                } else {
                                                                    echo "Perempuan";
                                                                } ?></span></td>
                    <td><span class="text-xs text-secondary font-weight-bold"><?= $row['email']; ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['password'] ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['noHP'] ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['tanggalLahir'] ?></span></td>
                    <td><span class="text-secondary text-xs"><?= $row['dibuatPada'] ?></span></td>

                    <td>
                        <div class="col"> <a href="<?= base_url('Admin/deleteProfile/' . $row['id']) ?>" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"><i class="far fa-trash-alt me-2"></i>Delete</a></div>
                    </td>

                </tr>
            <?php endforeach; ?>

        </table>


        <?= $pager->links('akun', 'my_pagination') ?>

        <br>


    </div>



    <?= $this->endSection(); ?>