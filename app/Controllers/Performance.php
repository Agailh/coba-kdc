<?php

namespace App\Controllers;

use App\Models\kdcModel;
use App\Models\PicModel;
use CodeIgniter\Validation\StrictRules\Rules;

class Performance extends BaseController
{

    protected $picModel;
    protected $kdcModel;
    protected $validation;
    public function __construct()
    {
        $this->picModel = new PicModel();
        $this->kdcModel = new kdcModel();

        $this->validation = \Config\Services::validation();
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
            'kdcData' => $this->kdcModel->getAllByKodePic($kode_pic),
            'validation' => $this->validation,

        ];
        return view('performance/detail', $kdcData);
    }

    public function edit($kode_pic)
    {

        $kdcData = [
            'kdcData' => $this->kdcModel->getAllByKodePic($kode_pic),
            'validation' => $this->validation,

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

        // Validate the input
        $validationRules = [
            'weight.*' => 'numeric',
            'score.*' => 'numeric',
            'ws.*' => 'numeric',
        ];

        if (!$this->validate($validationRules)) {
            // Pass the validation instance and the update data to the view
            session()->setFlashdata('pesan', 'Weight, Score dan WS harus berupa angka!');
            return redirect()->to('/performance/edit/' . $kode_pic);
        } else {
            // Perform the update
            $this->kdcModel->updateBatch($updateData, 'no_kpi');

            session()->setFlashdata('pesan', 'Data berhasil di update');
            return redirect()->to('/performance/detail/' . $kode_pic);
        }
    }

    public function delete($kode_pic, $no_kpi)
    {

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
