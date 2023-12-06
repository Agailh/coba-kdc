<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db  = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        return view('User/index');
    }

    public function edit()
    {
        $rules = [
            'fullname' => 'required|max_length[255]',
            'username' => 'required|max_length[255]',
        ];

        if ($this->validate($rules)) {

            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'username' => $this->request->getPost('username'),
            ];


            $this->builder->where('id', user()->id);
            $this->builder->update($data);


            return redirect()->to(base_url('user'))->with('success', 'Full name updated successfully');
        } else {

            return view('User/edit', ['validation' => $this->validator]);
        }
    }
}
