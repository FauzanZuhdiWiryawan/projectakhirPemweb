<?php


namespace App\Controllers;

session_start();

class Profile extends BaseController
{

    public function index()
    {

        $data = [
            'title' => 'Halaman Profile',
            'profile' => $this->AkunModel->getProfile($_SESSION['email'])
        ];
        return view("profile/index", $data);
    }
    public function riwayat()
    {

        $data = [
            'title' => 'Halaman Profile',
            'profile' => $this->AkunModel->getProfile($_SESSION['email']),
            'transaksi' => $this->TransaksiModel->getMyFinishedTransaksi($_SESSION['profile'][0]['id'])
        ];
        return view("profile/biodata", $data);
    }
    public function update()
    {
        if ($this->request->getFile('profilePicture') != null) {
            $file = $this->request->getFile('profilePicture');
            $file->move(ROOTPATH . "public/img/");
            $_POST['profilePicture'] = $file->getName();
        }
        $this->AkunModel->updateProfile($_POST);
        return redirect()->to(base_url("Profile"));
    }
}
