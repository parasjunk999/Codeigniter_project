<?php

namespace App\Controllers;

use App\Models\UserModel;

class PixabaySearch extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('pixabaysearch');

    }
}