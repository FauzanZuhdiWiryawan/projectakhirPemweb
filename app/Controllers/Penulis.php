<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    protected $PenulisModel;

    public function __construct()
    {
        $this->PenulisModel = new PenulisModel();
    }



    public function index()
    {



        $currentPage = $this->request->getVar('page_penulis') ? $this->request->getVar('page_penulis') : 1;
        $data = [
            'title' => 'List Penulis',
            'data' => $this->PenulisModel->getPenulis(),
            'pager' => $this->PenulisModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'

        ];

        return view('penulis/index', $data);
    }
    public function showListPenulis()
    {



        $currentPage = $this->request->getVar('page_penulis') ? $this->request->getVar('page_penulis') : 1;
        $data = [
            'title' => 'List Penulis',
            'data' => $this->PenulisModel->getPenulis(),
            'pager' => $this->PenulisModel->pager,
            'currentPage' => $currentPage

        ];

        return view('penulis/index', $data);
    }
    public function searchPenulis()
    {



        $currentPage = $this->request->getVar('page_penulis') ? $this->request->getVar('page_penulis') : 1;
        $data = [
            'title' => 'List Penulis',
            'data' => $this->PenulisModel->search($_GET['keyword']),
            'pager' => $this->PenulisModel->pager,
            'currentPage' => $currentPage,
            'navbar' => 'none'
        ];

        return view('penulis/index', $data);
    }

    public function editPenulisProcess()
    {


        if ($this->request->getFile('fotoPenulis') != null) {
            $file = $this->request->getFile('fotoPenulis');
            $file->move(ROOTPATH . "public/img/");
            $_POST['fotoPenulis'] = $file->getName();
        }
        $this->PenulisModel->editPenulis($_POST);
        return redirect()->to(base_url("Penulis/index"));
    }
    public function addPenulisProcess()
    {
        if ($this->request->getFile('fotoPenulis') != null) {
            $file = $this->request->getFile('fotoPenulis');
            $file->move(ROOTPATH . "public/img/");
            $_POST['fotoPenulis'] = $file->getName();
        }
        $this->PenulisModel->insertPenulis($_POST);
        return redirect()->to(base_url("Penulis/index"));
    }
}
