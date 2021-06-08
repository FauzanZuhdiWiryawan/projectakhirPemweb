<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="bg-white">
    <!--bagian1-->
    <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="card card-plain mt-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang, <?php session_start();
                                                                                        echo $_SESSION['profile'][0]['namaDepan'] . " " . $_SESSION['profile'][0]['namaBelakang']; ?></h3>
            </div>
            <div class="card-body text-center">
                <img src="../img/imghomepage.png" alt="">
                <hr class="horizontal dark mt-3">
                <h3>Selamat Datang di Perpustakaan Online</h3>
                <p>Perpustakaan online yang menyediakan berbagai macam referensi
                    terkait dunia akademik maupun non akademik dengan berbagai macam topik</p>
                <div class="row d-flex justify-content-center mt-6 mb-8">
                    <a class="btn bg-gradient-info w-15" href="<?= base_url('Buku') ?>">Daftar Buku</a>
                    <div class="col-md-1"></div>
                    <a href=<?= base_url("Penulis/showListPenulis") ?> class="btn bg-gradient-primary w-15">Daftar Penulis</a>


                </div>
            </div>
        </div>
    </div>
    <!--bagian3-->
    <div class="">
        <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="carousel slide mt-6 mb-6" id="quote-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <figure class="text-center">
                            <blockquote class="blockquote">
                                <h2>"Live life to the fullest, and focus on the positive."</h2>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <h4>Matt Cameron</h4>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <figure class="text-center">
                            <blockquote class="blockquote">
                                <h2>"The only disability in life is a bad attitude."</h2>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <h4>Scott Hamilton</h4>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <figure class="text-center">
                            <blockquote class="blockquote">
                                <h2>"Life is a daring adventure or nothing at all."</h2>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <h4>Helen Keller</h4>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--bagian2-->
    <div class="bg-gradient-dark text-white">
        <div class="col-xl-10 col-lg-5 col-md-6 d-flex flex-column mx-10 justify-content-center">
            <br>
            <h2 class="text-white  mt-5 ">Tahukah Kamu?</h2>
            <div class="row gx-5">
                <div class="col-md-4">
                    <img class="img-fluid" src="../img/unescoo.png" alt="Sekolah">
                </div>
                <div class="col-md-6 mx-auto align-self-center text-bold">
                    <p>UNESCO menyebutkan Indonesia urutan kedua dari bawah soal literasi dunia,
                        artinya minat baca sangat rendah. Menurut data UNESCO, minat baca masyarakat Indonesia sangat
                        memprihatinkan, hanya 0,001%. Artinya, dari 1,000 orang Indonesia, cuma 1 orang yang rajin membaca!</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p>Indonesia dinyatakan menduduki peringkat ke-60 dari 61 negara soal minat membaca,
                        persis berada di bawah Thailand (59) dan di atas Bostwana (61). Padahal, dari segi penilaian
                        infrastuktur untuk mendukung membaca, peringkat Indonesia berada di atas negara-negara Eropa.</p>
                </div>
                <div class="col-md-4 mx-auto">
                    <img class="img-fluid" src="../img/glooobe.png" alt="Organisasi">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="../img/report.png" alt="Nilai">
                </div>
                <div class="col-md-6 mx-auto align-self-center">
                    <p>Ironisnya, meski minat baca buku rendah tapi data wearesocial per Januari 2017
                        mengungkap orang Indonesia bisa menatap layar gadget kurang lebih 9 jam sehari.
                        Tidak heran dalam hal kecerewetan di media sosial orang Indonesia berada di urutan ke 5 dunia.
                        Juara deh. Jakarta lah kota paling cerewet di dunia maya karena sepanjang hari,
                        aktivitas kicauan dari akun Twitter yang berdomisili di ibu kota Indonesia ini paling padat melebihi
                        Tokyo dan New York. Laporan ini berdasarkan hasil riset Semiocast, sebuah lembaga independen di Paris.</p>
                </div>
            </div>
            <br>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>