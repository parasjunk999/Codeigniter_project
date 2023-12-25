<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('/dashboard'));
        }

        echo view('common/header');
        echo view('login');
    }

    public function do_login()
    {
        $UserModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $UserModel->where('email', $email)->first();

        if ($result && password_verify($password, $result->password)) {

            $this->session->set("user", $result);
        
            $this->session->set('isLoggedIn', true);

            return redirect()->to('/dashboard');
        } else {
            echo "Invalid credentials";
        }
    }

    public function logout()
    {

        $this->session->remove(["user", "isLoggedIn"]);
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
