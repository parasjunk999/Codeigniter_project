<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('login');
    }
    public function do_login()
    {
        $UserModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $UserModel->where('email', $email)->first();

        if ($result->id > 0) {
            if (password_verify($password, $result->password)) {

                $this->session->set("user", $result);

                return redirect()->to('/dashboard');


            } else {
                echo "invalid credentials";
            }
        } else {
            echo "invalid credentials";
        }
    }
    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}