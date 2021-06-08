<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $useTimestamps = true;
    protected $createdField  = 'dibuatPada';

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
    public function getId($email)
    {
        $builder = $this->db->table('akun');
        $builder->where('email', $email);
        $builder->select('id');
        return $builder->get()->getResultArray();
    }
    public function getProfile($email = null)
    {
        $builder = $this->db->table('akun');
        if ($email == null) {
            $builder->select();
            return $builder->get()->getResultArray();
        }
        $builder->where('email', $email);
        $builder->select();
        return $builder->get()->getResultArray();
    }
    public function getNewestUser()
    {
        $builder = $this->db->table('akun');
        $builder->select();
        $builder->orderBy('dibuatPada', 'DESC');
        return $builder->get()->getResultArray();
    }
    public function updateProfile($param)
    {
        $builder = $this->db->table('akun');

        $builder->ignore(true)->update($param);
    }
    public function search($keyword)
    {

        return $this->like('id', $keyword)->orLike('namaDepan', $keyword)
            ->orLike('namaBelakang', $keyword)->orLike('jenisKelamin', $keyword)
            ->orLike('email', $keyword)->orLike('password', $keyword)
            ->orLike('noHP', $keyword)->orLike('tanggalLahir', $keyword)->paginate(5, 'akun');
    }
    public function removeAkun($idAkun)
    {
        $builder = $this->db->table('akun');
        $builder->where('id =', $idAkun);
        $builder->delete();
    }
    public function addAkun($param)
    {
        $builder = $this->db->table('akun');
        $builder->insert($param);
    }
}
