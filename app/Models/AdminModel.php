<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';

    public function validation($param)
    {
        $data = $this->findAll();
        foreach ($data as $row) {
            if ($row['email'] == $param['email'] && $row['password'] == $param['password']) {
                return true;
            }
        }
        return false;
    }
}