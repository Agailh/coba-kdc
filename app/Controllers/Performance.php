<?php

namespace App\Controllers;

use App\Models\kdcModel;
use App\Models\PicModel;

class Performance extends BaseController
{
    protected $picModel;
    protected $kdcModel;
    public function __construct()
    {
        $this->picModel = new PicModel();
        $this->kdcModel = new kdcModel();
    }




    public function index()
    {

        // $kdcModel = new kdcModel();
        // $kdcModel->findAll();
        // dd($kdcModel);
        // $picModel = $this->picModel->findAll();
        // $kdcModel = $this->kdcModel->findAll();
        $keyword = $this->request->getVar('keyword');

        // Search in picModel
        // if ($keyword) {
        //     $data['pic'] = $this->picModel->search($keyword);
        // } else {
        //     $data['pic'] = $this->picModel->getAll();
        // }

        // $data = [

        //     // 'pic' => $picModel,
        //     // 'kdc' => $kdcModel,

        // ];
        // $data['kdc'] = $this->kdcModel->getAll();
        $data['pic'] = $this->picModel->getAll();

        return view('/Performance/index', $data);
    }
}
