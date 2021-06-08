<?php


namespace App\Controllers;



class Transaksi extends BaseController
{
    public function addTransaksi()
    {
        session_start();

        $param['isbn'] = $this->CartModel->getAllBuku();
        foreach ($param['isbn'] as $data) {
            $this->BukuModel->rentBuku($data['isbn']);
        }
        $param['idAkun'] = $this->AkunModel->getId($_SESSION['email'])[0]['id'];
        $date = date_create();
        $param['tanggalPinjam'] = date_format($date, "Y-m-d");
        date_add($date, date_interval_create_from_date_string("7 days"));
        $param['tanggalWajibKembali'] = date_format($date, "Y-m-d");
        $date =  date_format($date, "Y-m-d");
        $this->TransaksiModel->insertTransaksi($param);
        $this->CartModel->wipeCart();
        return redirect()->to(base_url("Buku"));
    }
    public function showTransaksi()
    {
        session_start();
        $data = [
            'title' => 'List Transaksi',
            'transaksi' => $this->TransaksiModel->getMyTransaksi($_SESSION['profile'][0]['id'])
        ];
        return view("transaksi/index", $data);
    }
    public function completeTransaksi()
    {
        $this->BukuModel->returnBuku($_POST['isbn']);
        $this->TransaksiModel->finishTransaksi($_POST['idTransaksi']);
        return redirect()->to(base_url("Transaksi/showTransaksi"));
    }
}
