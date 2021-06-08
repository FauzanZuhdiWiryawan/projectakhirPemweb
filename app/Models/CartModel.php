<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';



    public function insertBuku($param)
    {

        $builder = $this->db->table('cart');
        $builder->insert($param);
    }
    public function getTotal()
    {
        $builder = $this->db->table('cart');
        $builder->select();
        return count($builder->get()->getResultArray());
    }
    public function wipeCart()
    {
        $builder = $this->db->table('cart');
        $builder->emptyTable('cart');
    }
    public function getAllBuku()
    {
        $builder = $this->db->table('cart');
        $builder->select();
        return $builder->get()->getResultArray();
    }

    public function removeBuku($isbn)
    {
        $builder = $this->db->table('cart');
        $builder->where('isbn =', $isbn);
        $builder->delete();
    }
}
