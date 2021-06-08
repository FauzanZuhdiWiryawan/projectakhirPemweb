<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <a href=<?= base_url("Buku") ?>><img src="/img/arrow-left.svg" style="height:60px; width:60px" alt=""></a>

    <table class="table table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tahun Terbit</th>
            <th>Nama Pengarang</th>
            <th>Status</th>
            <th></th>

        </tr>

        <?php

        for ($i = 0; $i < count($data); $i++) :
        ?>
            <tr>

                <td><?= $i + 1 ?></td>
                <td><?= $data[$i][0]['judul'] ?></td>
                <td><?= $data[$i][0]['tahunTerbit'] ?></td>
                <td><?= $data[$i][0]['namaPenulis'] ?></td>
                <td><?= $data[$i][0]['statusBuku'] ?></td>
                <?php
                echo "<form action='Cart/remove' method='post'>";
                echo  "<input type='hidden'  name='isbn' value=" . $data[$i][0]['isbn'] . ">"; ?>
                <td><button type="submit" class="btn btn-danger"> <img style="width: 100%; height:100%;" src="/img/x-lg.svg" alt=""> </button></td>
                <?= "</form>" ?>
            </tr>

        <?php endfor; ?>

    </table>


    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <?php if (count($data) == 0) {
            echo "<div class='d-block'>";
            echo "<h2 class='text-center'>Keranjang anda masih kosong, harap pilih buku terlebih dahulu</h2>";

            echo "<button class='btn btn-secondary pr-auto' >Sewa Buku</button>";
            echo "</div>";
        } else {
            echo "<form action='Transaksi/addTransaksi' method='post'>";
            echo "<button class='btn btn-primary' type='submit'>Sewa Buku</button>";
            echo "</form>";
        }
        ?>

    </div>
</div>
<?= $this->endSection(); ?>