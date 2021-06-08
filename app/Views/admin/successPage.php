<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>Data anda berhasil <?= isset($val) ? "diedit" : "ditambahkan" ?></h2>
    <a href="<?= base_url('Admin/index') ?>" class="btn btn-primary">Kembali</a>

</div>
<?= $this->endSection(); ?>