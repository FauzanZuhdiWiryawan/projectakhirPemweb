<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table = 'penulis';

    public function getBukuPenulis($idPenulis)
    {
        $builder = $this->db->table('buku');
        $builder->where('idPenulis =', $idPenulis);
        $builder->select();
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getPenulis($idPenulis = false)
    {

        $builder = $this->db->table('penulis');

        $builder->select();

        if ($idPenulis == false) {

            $data = $builder->get()->getResultArray();
            $counter = 0;
            foreach ($data as $row) {
                $buku[$row['namaPenulis']] = $this->getBukuPenulis($row["idPenulis"]);
                $data[$counter]['judul'] =   $buku[$row['namaPenulis']];
                $counter++;
            }

            return $data;
        }
        $builder->where('idPenulis =', $idPenulis);
        $data = $builder->get()->getResultArray();

        return $data;
    }
    public function search($keyword)
    {
        $builder = $this->db->table('penulis');
        $builder->like('namaPenulis', $keyword);
        $builder->select();
        $data = $builder->get()->getResultArray();
        $counter = 0;
        foreach ($data as $row) {
            $buku[$row['namaPenulis']] = $this->getBukuPenulis($row["idPenulis"]);
            $data[$counter]['judul'] =   $buku[$row['namaPenulis']];
            $counter++;
        }
        return $data;
    }

    public function editPenulis($param)
    {

        $builder = $this->db->table('penulis');
        $builder->where('idPenulis =', $param['idPenulis']);
        $builder->set('fotoPenulis', $param['fotoPenulis']);
        $builder->set('namaPenulis', $param['namaPenulis']);
        $builder->ignore(true)->update();
    }
    public function insertPenulis($param)
    {

        $builder = $this->db->table('penulis');
        $builder->insert($param);
    }
}
