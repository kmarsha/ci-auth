<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User as ModelsUser;

class Login extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsUser();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->model->where('username', $username)->first();

        $verify_pass = password_verify($password, $user->password);

        if ($verify_pass) {
            $data_session = [
                'isLogin' => true,
                'username' => $username,
                'role' => $user->role,
            ];
            session()->set($data_session);

            if ($user->role == 'admin') {
                $route = 'admin';
            } elseif ($user->role == 'karyawan') {
                $route = 'employee';
            }

            return redirect()->route($route)->with('success', 'Berhasil Login!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Password salah!');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->route('home')->with('success', 'Berhasil logout!');
    }
}
