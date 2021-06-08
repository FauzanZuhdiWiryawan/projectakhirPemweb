<?php


namespace App\Controllers;



class Cart extends BaseController
{
    public function index()
    {
        $isbn = $this->CartModel->getAllBuku();
        $buku = [];
        foreach ($isbn as $data) {
            array_push($buku, $this->BukuModel->getBuku($data));
        }
        session_start();
        $_SESSION['count'] = $this->CartModel->getTotal();
        $data = [
            'title' => 'Cart',
            'count' => $this->CartModel->getTotal(),
            'data' => $buku
        ];
        return view("buku/cart", $data);
    }

    public function addCart()
    {

        $this->CartModel->insertBuku($_POST);

        return redirect()->to(base_url("Buku"));
    }

    public function remove()
    {
        $this->CartModel->removeBuku($_POST['isbn']);
        return redirect()->to(base_url("Cart"));
    }
}
