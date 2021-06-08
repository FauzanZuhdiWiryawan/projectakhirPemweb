<div id="mySidenav" class="navside bg-white mb-3 fixed-left ms-3">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href=<?= base_url("Pages/homepageAdmin") ?>>
        <i class="fa fa-desktop text-dark"></i>
        <span class="ms-1">Dashboard</span>
    </a>
    <a href="<?= base_url("Admin/index") ?>">
        <i class="fa fa-book-open text-dark"></i>
        <span class="ms-1">Daftar Buku</span>
    </a>
    <a href="<?= base_url("Penulis/index") ?>">
        <i class="fas fa-users text-dark"></i>
        <span class="ms-1">Daftar Penulis</span>
    </a>
    <a href=<?= base_url("Admin/showListProfile") ?>>
        <i class="fas fa-user-friends text-dark"></i>
        <span class="ms-1">Daftar Anggota</span>
    </a>
    <a href=<?= base_url("Admin/showListTransaksi") ?>>
        <i class="fas fa-retweet text-dark"></i>
        <span class="ms-1">Transaksi Peminjaman</span>
    </a>
    <a class="nav-link" href=<?= base_url("Login/logout") ?>>
        <i class="fas fa-sign-out-alt text-dark"></i>

        <span class="nav-link-text ms-1">Logout</span>
    </a>
</div>