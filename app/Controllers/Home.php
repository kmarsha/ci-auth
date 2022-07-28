<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        return view('home');
    }

    public function user()
    {
        $model = new User();
        $data['users'] = $model->findAll();

        return view('user', $data);
    }

    public function admin()
    {
        return view('admin');
    }

    public function karyawan()
    {
        return view('karyawan');
    }
}
