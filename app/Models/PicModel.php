<?php

namespace App\Models;

use CodeIgniter\Model;

class PicModel extends Model
{
    protected $table            = 'tbl_pic_kpi';
    protected $primaryKey       = 'kode_pic';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['pic', 'deskripsi'];


    function getAll()
    {
        $builder = $this->db->table('tbl_pic_kpi');
        $builder->join('tbl_kpi', 'tbl_kpi.kode_pic = tbl_pic_kpi.kode_pic');
        $query = $builder->get();
        return $query->getResult();
    }

    public function search($keyword)
    {
        $builder = $this->table('tbl_pic_kpi');
        $builder->like('pic', $keyword);
        return $builder;
    }
}
