<div class="position-sticky z-index-sticky top-0">
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
        <div class="container-fluid">
            <div class="navbar-brand font-weight-bolder ms-lg-0 ms-3 ">
                Perpustakaan Online
            </div>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse " id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item position-fixed center-menu-left">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href=<?= base_url("Pages/homepage") ?>>
                            <i class="fa fa-home opacity-6 text-dark me-1"></i>
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item position-fixed center-menu-right">
                        <a class="nav-link me-2" href=<?= base_url("Transaksi/showTransaksi") ?>>
                            <i class="fa fa-book opacity-6 text-dark me-1"></i>
                            Transaksi
                        </a>
                    </li>

                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a href=<?= base_url("Cart") ?> class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">
                            <?php if (session_id() == '') {

                                session_start();
                            }
                            $_SESSION['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : "";
                            if ($_SESSION['count'] != 0) {
                                echo $_SESSION['count'] . " " . "<img src='/img/cart-fill.svg' alt=''>";
                            } else {
                                echo  "<img src='/img/cart-fill.svg' alt=''>";
                            }

                            ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown ">
                            <button onclick="myFunction()" class="dropbtn btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">
                                <img src="/img/person-fill.svg" alt="">
                                <?= $_SESSION['profile'][0]['namaDepan'] . " " . $_SESSION['profile'][0]['namaBelakang'] ?>
                            </button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href=<?= base_url("Profile") ?>>Halaman Profile</a>
                                <a href=<?= base_url("Login/logout") ?>>Logout</a>

                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>