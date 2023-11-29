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
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['pic'] = $this->picModel->search($keyword);
        } else {
            $data['pic'] = $this->picModel->getAll();
        }


        return view('/Performance/index', $data);
    }

    public  function detail($kode_pic)
    {
        // Get all data for the specific kode_pic


        $kdcData = [
            'kdcData' => $this->kdcModel->getAllByKodePic($kode_pic)

        ];
        return view('performance/detail', $kdcData);
    }

    public function edit($kode_pic)
    {

        $kdcData = [
            'kdcData' => $this->kdcModel->getAllByKodePic($kode_pic)

        ];
        return view('performance/edit', $kdcData);
    }

    public function update($kode_pic)
    {
        $this->kdcModel->save([
            'no_kpi' => $kode_pic,
            'weight' => $this->request->getVar('weight'),
            'uom' => $this->request->getVar('uom'),
            'target' => $this->request->getVar('target'),
            'freq' => $this->request->getVar('freq'),
            'criteria' => $this->request->getVar('criteria'),
            'score' => $this->request->getVar('score'),
            'ws' => $this->request->getVar('ws'),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil di update');
        return redirect()->to('/performance');
    }
}



// public function index()
// {

//     // $kdcModel = new kdcModel();
//     // $kdcModel->findAll();
//     // dd($kdcModel);
//     // $picModel = $this->picModel->findAll();
//     // $kdcModel = $this->kdcModel->findAll();
//     $keyword = $this->request->getVar('keyword');

//     // Search in picModel
//     // if ($keyword) {
//     //     $data['pic'] = $this->picModel->search($keyword);
//     // } else {
//     //     $data['pic'] = $this->picModel->getAll();
//     // }

//     // $data = [

//     //     // 'pic' => $picModel,
//     //     // 'kdc' => $kdcModel,

//     // ];
//     // $data['kdc'] = $this->kdcModel->getAll();
//     $data['pic'] = $this->picModel->getAll();

//     return view('/Performance/index', $data);
// }