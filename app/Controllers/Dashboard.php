<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $user = session('user');

        if (!$user || $user->id < 1) {
            return redirect()->to('login');
        }

        $userData = (new UserModel())->find($user->id);

        echo view('common/header');
        echo view('dashboard', ['userData' => $userData]);
    }
}
