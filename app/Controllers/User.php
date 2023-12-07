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
            'user_image' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png,image/svg+xml]',
        ];

        // Check if a file is uploaded before applying validation rules
        if ($file = $this->request->getFile('user_image')) {
            // Remove the 'required' rule for user_image if no file is uploaded
            if (!$file->isValid()) {
                unset($rules['user_image']);
            }
        }

        if ($this->validate($rules)) {
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'username' => $this->request->getPost('username'),
            ];

            // Check if a new profile picture is uploaded
            if ($file) {
                // Only process the file if a valid file is uploaded
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/uploads/profile_pics', $newName);
                    $data['user_image'] = $newName;
                }
            }

            // Update the user's data
            $this->builder->update($data, ['id' => user()->id]);

            session()->setFlashdata('pesan', 'Profile berhasil diupdate!');
            return redirect()->to(base_url('user'))->with('success', 'Profile updated successfully');
        } else {
            return view('User/edit', ['validation' => $this->validator]);
        }
    }





    // public function updateProfilePicture()
    // {
    //     $rules = [
    //         'user_image' => 'uploaded[user_image]|max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png,image/svg+xml]',
    //     ];


    //     if ($this->validate($rules)) {
    //         $file = $this->request->getFile('user_image');
    //         $newName = $file->getRandomName();

    //         // Move the uploaded file to a writable directory
    //         $file->move(ROOTPATH . 'public/uploads/profile_pics', $newName);

    //         // Update the database with the new file name
    //         $data = [
    //             'user_image' => $newName,
    //         ];

    //         $this->builder->where('id', user()->id);
    //         $this->builder->update($data);

    //         session()->setFlashdata('pesan', 'Profile picture berhasil di update !');
    //         return redirect()->to(base_url('user'))->with('success', 'Profile picture updated successfully');
    //     } else {
    //         return view('User/edit', ['validation' => $this->validator]);
    //     }
    // }
}
