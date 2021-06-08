<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategoribuku';

    public function getKategori()
    {
        $builder = $this->db->table('kategoribuku');
        $builder->select();
        return $builder->get()->getResultArray();
    }
}
