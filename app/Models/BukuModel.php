<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $useTimestamps = true;
    protected $createdField  = 'ditambahkanPada';
    protected $updatedField  = 'dipinjamPada';

    public function getBuku($isbn = false)
    {

        $builder = $this->db->table('buku');
        $builder->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner');
        $builder->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner');
        $builder->select();
        if ($isbn == false) {
            $data = $builder->get()->getResultArray();
            return $data;
        }
        $builder->where('isbn =', $isbn);
        $data = $builder->get()->getResultArray();

        return $data;
    }
    public function getRecentlyRentBuku()
    {
        $builder = $this->db->table('buku');
        $builder->select();
        $builder->limit(5);
        $builder->where('statusBuku =', 'Dipinjam');
        $builder->orderBy('dipinjamPada', 'DESC');
        return $builder->get()->getResultArray();
    }
    public function insertBuku($param)
    {

        $namaPenulis = $this->db->table('penulis');
        $namaPenulis->select();
        $namaPenulis->where('namaPenulis =', $param['namaPenulis']);
        $idPenulis = $namaPenulis->get()->getResultArray();
        $namaKategori = $this->db->table('kategoribuku');
        $namaKategori->select();
        $namaKategori->where('namaKategori =', $param['namaKategori']);
        $idKategori = $namaKategori->get()->getResultArray();

        unset($param['namaPenulis']);
        unset($param['namaKategori']);
        $param['idPenulis'] = $idPenulis[0]['idPenulis'];
        $param['idKategori'] = $idKategori[0]['idKategori'];
        $builder = $this->db->table('buku');


        $builder->insert($param);
    }

    public function updateBuku($param)
    {
        $namaPenulis = $this->db->table('penulis');
        $namaPenulis->select();
        $namaPenulis->where('namaPenulis =', $param['namaPenulis']);
        $idPenulis = $namaPenulis->get()->getResultArray();
        $namaKategori = $this->db->table('kategoribuku');
        $namaKategori->select();
        $namaKategori->where('namaKategori', $param['namaKategori']);
        $idKategori = $namaKategori->get()->getResultArray();
        unset($param['namaPenulis']);
        unset($param['namaKategori']);
        $param['idPenulis'] = $idPenulis[0]['idPenulis'];
        $param['idKategori'] = $idKategori[0]['idKategori'];
        $builder = $this->db->table('buku');
        $builder->ignore(true)->update($param);
    }

    public function search($keyword)
    {
        return $this->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
            ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')
            ->like('judul', $keyword)
            ->orLike('tahunTerbit', $keyword)
            ->orLike('namaPenulis', $keyword)
            ->orLike('statusBuku', $keyword)
            ->orLike('isbn', $keyword)
            ->orLike('namaKategori', $keyword)
            ->paginate(10, 'buku');
    }

    public function removeBuku($isbn)
    {
        $builder = $this->db->table('buku');
        $builder->where('isbn =', $isbn);
        $builder->delete();
    }
    public function rentBuku($isbn)
    {
        $builder = $this->db->table('buku');
        $builder->where('isbn =', $isbn);
        $builder->set('statusBuku', "Dipinjam");
        date_default_timezone_set("Asia/Bangkok");
        $builder->set('dipinjamPada', date("Y-m-d H:i:s"));
        $builder->update();
    }
    public function getRentedBuku()
    {
        $builder = $this->db->table('buku');
        $builder->where('statusBuku', "Dipinjam");
        $builder->select();
        return $builder->get()->getResultArray();
    }
    public function returnBuku($isbn)
    {
        $builder = $this->db->table('buku');
        $builder->where('isbn =', $isbn);
        $builder->set('statusBuku', "Tersedia");
        $builder->set('dipinjamPada', null);
        $builder->update();
    }
}
