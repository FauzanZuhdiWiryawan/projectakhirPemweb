<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\PenulisModel;

class Admin extends BaseController
{
    protected $kategoriModel;
    protected $penulisModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->penulisModel = new PenulisModel();
    }
    public function addData()
    {

        $data = [
            'title' => 'Form Insert Buku',
            'kategori' => $this->kategoriModel->getKategori(),
            'penulis' => $this->penulisModel->getPenulis()
        ];
        return view('buku/form', $data);
    }
    public function deleteBuku($isbn)
    {
        $this->BukuModel->removeBuku($isbn);
        return redirect()->to(base_url('Admin/index'));
        exit;
    }
    public function editData($isbn)
    {
        $data = [
            'title' => 'Form Edit Buku',
            'data' => $this->BukuModel->getBuku($isbn),
            'val' => 'edit',
            'kategori' => $this->kategoriModel->getKategori(),
            'penulis' => $this->penulisModel->getPenulis()
        ];
        return view('buku/form', $data);
    }
    public function addDataProcess()
    {
        if ($this->request->getFile('cover') != null) {
            $file = $this->request->getFile('cover');
            $file->move(ROOTPATH . "public/img/");
            $_POST['cover'] = $file->getName();
        }


        $this->BukuModel->insertBuku($_POST);
        $data = [
            'title' => 'Success Notification'
        ];

        return view('admin/successPage', $data);
    }
    public function editDataProcess()
    {
        $this->BukuModel->updateBuku($_POST);

        $data = [
            'title' => 'Success Notification',
            'val' => 'edit'
        ];
        return view('admin/successPage', $data);
    }
    public function searchBook()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->BukuModel->search($keyword);
        } else {
            return $this->index();
        }
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $buku,
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none',
            'kategori' => $this->kategoriModel->getKategori(),
            'penulis' => $this->penulisModel->getPenulis(),

        ];
        return view('admin/listBuku', $data);
    }


    public function index()
    {


        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $this->BukuModel->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
                ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')->paginate(10, 'buku'),
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none',
            'kategori' => $this->kategoriModel->getKategori(),
            'penulis' => $this->penulisModel->getPenulis()

        ];

        return view('admin/listBuku', $data);
    }
    public function searchProfile()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $profile = $this->AkunModel->search($keyword);
        } else {
            return $this->showListProfile();
        }
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $profile,
            'pager' => $this->AkunModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'
        ];
        return view('admin/listProfile', $data);
    }
    public function showListProfile()
    {
        $currentPage = $this->request->getVar('page_akun') ? $this->request->getVar('page_akun') : 1;
        $data = [
            'title' => 'List Profile Pengguna',
            'data' => $this->AkunModel->paginate(5, 'akun'),
            'pager' => $this->AkunModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'

        ];

        return view('admin/listProfile', $data);
    }
    public function searchTransaksi()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $transaksi = $this->TransaksiModel->search($keyword);
        } else {
            return $this->showListTransaksi();
        }
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;
        $data = [
            'title' => 'List Transaksi',
            'data' => $transaksi,
            'pager' => $this->TransaksiModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'
        ];
        return view('admin/listTransaksi', $data);
    }
    public function showListTransaksi()
    {
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;
        $data = [
            'title' => 'List Transaksi',
            'data' => $this->TransaksiModel->join('buku', 'buku.isbn = transaksi.isbn', 'inner')
                ->join('akun', 'akun.id = transaksi.idAkun', 'inner')->paginate(5, 'transaksi'),
            'pager' => $this->TransaksiModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'

        ];

        return view('admin/listTransaksi', $data);
    }
    public function listTransaksi()
    {

        $_POST['val'] = isset($_POST['val']) ? $_POST['val'] : "";
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;
        if ($_POST['val'] == "true") {

            $where = "tanggalKembali is NOT NULL";
            $data = [
                'title' => 'List Transaksi',
                'data' => $this->TransaksiModel->join('buku', 'buku.isbn = transaksi.isbn', 'inner')
                    ->join('akun', 'akun.id = transaksi.idAkun', 'inner')->where($where)->paginate(5, 'transaksi'),
                'pager' => $this->TransaksiModel->pager,
                'currentPage' => $currentPage,
                'navbar' => 'none'
            ];
            return view('admin/listTransaksi', $data);
        }
        $where = "tanggalKembali is NULL";
        $data = [
            'title' => 'List Transaksi',
            'data' => $this->TransaksiModel->join('buku', 'buku.isbn = transaksi.isbn', 'inner')
                ->join('akun', 'akun.id = transaksi.idAkun', 'inner')->where($where)->paginate(5, 'transaksi'),
            'pager' => $this->TransaksiModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'

        ];

        return view('admin/listTransaksi', $data);
    }
    public function deleteProfile($idAkun)
    {
        $this->AkunModel->removeAkun($idAkun);
        return redirect()->to(base_url('Admin/showListProfile'));
        exit;
    }
    public function deleteTransaksi($idTransaksi)
    {
        $this->TransaksiModel->removeTransaksi($idTransaksi);
        return redirect()->to(base_url('Admin/showListTransaksi'));
        exit;
    }
}
