<?php


namespace App\Controllers;



class Buku extends BaseController
{

    public function index()
    {

        session_start();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->BukuModel->search($keyword);
        } else {
            $buku = $this->BukuModel->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
                ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')->paginate(10, 'buku');
        }
        $_SESSION['count'] = $this->CartModel->getTotal();
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $buku,
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage,
            'carts' => $this->CartModel->getAllBuku(),
            'rentedBooks' => $this->BukuModel->getRentedBuku()

        ];

        return view('buku/listBuku', $data);
    }
}
