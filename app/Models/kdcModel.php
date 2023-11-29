<?php

namespace App\Models;

use CodeIgniter\Model;

class kdcModel extends Model
{
    protected $table = 'tbl_kpi';
    protected $primaryKey = 'no_kpi';
    protected $returnType = 'object';
    protected $allowedFields = ['weight', 'uom', 'target', 'freq', 'criteria', 'ach', 'score', 'ws'];
    protected $useTimeStaps = true;

    public function getAllByKodePic($kode_pic)
    {
        $builder = $this->db->table('tbl_kpi');
        $builder->join('tbl_pic_kpi', 'tbl_pic_kpi.kode_pic = tbl_kpi.kode_pic');
        $builder->where('tbl_kpi.kode_pic', $kode_pic);
        $query = $builder->get();
        return $query->getResult();
    }
}
