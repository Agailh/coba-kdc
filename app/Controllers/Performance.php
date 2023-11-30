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
        $updateData = [];


        $weights = $this->request->getVar('weight');
        $uoms = $this->request->getVar('uom');
        $target = $this->request->getVar('target');
        $freq = $this->request->getVar('freq');
        $criteria = $this->request->getVar('criteria');
        $ach = $this->request->getVar('ach');
        $score = $this->request->getVar('score');
        $ws = $this->request->getVar('ws');



        // Loop through the arrays and build the update data
        foreach ($weights as $no_kpi => $weight) {
            $updateData[] = [
                'no_kpi' => $no_kpi,
                'weight' => $weight,
                'uom' => $uoms[$no_kpi],
                'target' => $target[$no_kpi],
                'freq' => $freq[$no_kpi],
                'criteria' => $criteria[$no_kpi],
                'ach' => $ach[$no_kpi],
                'score' => $score[$no_kpi],
                'ws' => $ws[$no_kpi],

            ];
        }

        // Perform the update
        $this->kdcModel->updateBatch($updateData, 'no_kpi');

        session()->setFlashdata('pesan', 'Data berhasil di update');
        return redirect()->to('/performance');
    }
    public function delete($kode_pic, $no_kpi)
    {
        // Check if the row can be deleted based on your criteria
        $row = $this->kdcModel->find($no_kpi);

        if ($row && $row->updated) {
            $this->kdcModel->delete($no_kpi);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('pesan', 'Data tidak dapat dihapus');
        }

        return redirect()->to('/performance/detail/' . $kode_pic);
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