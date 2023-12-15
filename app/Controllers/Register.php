<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('register');
    }

    public function do_register()
    {
        $UserModel = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $imageName = null;

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);

            $password = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'image' => $imageName,
            ];

            $r = $UserModel->insert($data);

            if ($r) {
                echo "Success";
            } else {
                echo "Error";
            }
        }
    }
}
