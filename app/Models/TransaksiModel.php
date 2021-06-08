<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function insertTransaksi($idTransaksi)
    {
        $builder = $this->db->table('transaksi');

        foreach ($idTransaksi['isbn'] as $data) {
            $data['idAkun'] = $idTransaksi['idAkun'];
            $data['tanggalPinjam'] = $idTransaksi['tanggalPinjam'];
            $data['tanggalWajibKembali'] = $idTransaksi['tanggalWajibKembali'];

            $builder->ignore(true)->insert($data);
        }
    }
    public function getMyTransaksi($idAkun)
    {
        $builder = $this->db->table('transaksi');
        $builder->select();
        $builder->join('buku', 'buku.isbn = transaksi.isbn', 'inner');
        $builder->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner');
        $builder->where('idAkun =', $idAkun);
        $where = "tanggalKembali is NULL";
        $builder->where($where);
        return $builder->get()->getResultArray();
    }
    public function getRecentlyTransaksi()
    {
        $builder = $this->db->table('transaksi');
        $builder->select();
        $builder->orderBy('tanggalPinjam', 'DESC');
        $builder->join('akun', 'akun.id = transaksi.idAkun', 'inner');
        $builder->limit(5);
        return $builder->get()->getResultArray();
    }
    public function finishTransaksi($idTransaksi)
    {
        $builder = $this->db->table('transaksi');
        date_default_timezone_set("Asia/Bangkok");
        $builder->set('tanggalKembali',  date("Y-m-d"));
        $builder->where('idTransaksi =', $idTransaksi);
        $builder->update();
    }

    public function getTransaksi($done = false)
    {
        $builder = $this->db->table('transaksi');
        if ($done == false) {
            $builder->select();
            $where = "tanggalKembali is NULL";
            $builder->where($where);
            return $builder->get()->getResultArray();
        }
        $builder->select();
        $where = "tanggalKembali is NOT NULL";
        $builder->where($where);
        return $builder->get()->getResultArray();
    }
    public function search($keyword)
    {

        return $this->join('buku', 'buku.isbn = transaksi.isbn', 'inner')
            ->join('akun', 'akun.id = transaksi.idAkun', 'inner')->like('id', $keyword)
            ->orLike('namaDepan', $keyword)->orLike('namaBelakang', $keyword)
            ->orLike('email', $keyword)->orLike('transaksi.isbn', $keyword)->orLike('judul', $keyword)
            ->orLike('tanggalPinjam', $keyword)->orLike('tanggalWajibKembali', $keyword)
            ->orLike('tanggalKembali', $keyword)->paginate(5, 'transaksi');
    }
    public function removeTransaksi($idTransaksi)
    {
        $builder = $this->db->table('transaksi');
        $builder->where('idTransaksi', $idTransaksi);
        $builder->delete();
    }
    public function getMyFinishedTransaksi($idAkun)
    {
        $builder = $this->db->table('transaksi');
        $builder->select();
        $builder->join('buku', 'buku.isbn = transaksi.isbn', 'inner');
        $builder->join('kategoriBuku', 'buku.idKategori = kategoriBuku.idKategori', 'inner');
        $builder->where('idAkun =', $idAkun);

        $where = "tanggalKembali is not NULL";
        $builder->where($where);
        return $builder->get()->getResultArray();
    }
}
