<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->builder = $this->db->table('user');
    }
    public function index()
    {
        return view('User/index');
    }
    public function Edit($id)
    {


        return view('User/edit');
    }
}
