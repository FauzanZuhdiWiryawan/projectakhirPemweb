<?php

namespace App\Controllers;





class Login extends BaseController
{

    public function index()
    {
        session_start();
        $this->CartModel->wipeCart();
        $_SESSION['count'] = $this->CartModel->getTotal();

        $data = [
            'title' => 'Login',
            'navbar' => 'none',
            'footer' => 'none'
        ];
        return view('login/loginForm', $data);
    }

    public function login_process()
    {

        session_start();
        $_SESSION['dataLogin'] = $_POST;


        $this->CartModel->wipeCart();
        $_SESSION['count'] = $this->CartModel->getTotal();
        $val = $this->AkunModel->validation($_SESSION['dataLogin']);
        if ($val) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['profile'] = $this->AkunModel->getProfile($_POST['email']);

            return redirect()->to(base_url("Pages/homepage"));
        }
        $val = $this->AdminModel->validation($_SESSION['dataLogin']);
        if ($val) {

            return redirect()->to(base_url("Pages/homepageAdmin"));
        }
        $data = [
            'title' => 'Login',
            'navbar' => 'none',
            'footer' => 'none'
        ];

        return view('login/loginForm', $data);
    }
    public function logout()
    {
        session_start();
        $this->CartModel->wipeCart();
        session_destroy();

        $data = [
            'title' => 'Login'
        ];
        return view('login/loginForm', $data);
    }
    public function daftar()
    {
        $this->AkunModel->addAkun($_POST);
        return redirect()->to(base_url("Login"));
    }
}
