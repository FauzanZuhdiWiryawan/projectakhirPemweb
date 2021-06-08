<?php

namespace App\Controllers;


class Pages extends BaseController
{


    public function listBuku()
    {
        $data = [
            'title' => 'Daftar Isi buku'
        ];
        return view('pages/listBuku' . $data);
    }

    public function listPenulis()
    {
        $data = [
            'title' => 'Daftar Isi penulis'
        ];
        return view('pages/listPenulis', $data);
    }
    public function homepage()
    {
        $data = [
            'title' => 'Homepage'
        ];
        return view('pages/homepage', $data);
    }
    public function homepageAdmin()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'Admin Page',
            'navbar' => 'none',
            'jumlahBuku' => count($this->BukuModel->getBuku()),
            'jumlahAnggota' => count($this->AkunModel->getProfile()),
            'jumlahTransaksiBelumSelesai' => count($this->TransaksiModel->getTransaksi()),
            'jumlahTransaksiSelesai' => count($this->TransaksiModel->getTransaksi(true)),
            'buku' => $this->BukuModel->getRecentlyRentBuku(),
            'akun' => $this->AkunModel->getNewestUser(),
            'currentPage' => $currentPage,
            'transaksiTerbaru' => $this->TransaksiModel->getRecentlyTransaksi()


        ];
        return view('admin/index', $data);
    }
}
