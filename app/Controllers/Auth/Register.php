<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Employee;
use App\Models\User;

class Register extends BaseController
{
    public function __construct()
    {
        $this->userModel = new User();
        $this->karyawanModel = new Employee();
    }

    public function index()
    {
        return view('auth/register');
    }

    public function auth()
    {
        $validated = $this->validate([
            'username' => 'is_unique[users.username]',
        ]);

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $usia = $this->request->getPost('usia');

        if ($validated) {
            $dataUser = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'role' => 'karyawan',
            ];

            $this->userModel->insert($dataUser);
    
            $user = $this->userModel->where('username', $username)->get();
            $user_id = $user->getResult()[0]->user_id;
    
            $dataKaryawan = [
                'id_user' => $user_id,
                'nama_karyawan' => $nama,
                'usia' => $usia,
            ];

            $this->karyawanModel->insert($dataKaryawan);

            session()->setFlashdata('success', 'Berhasil Register!');
            
            $data_session = [
                'isLogin' => true,
                'username' => $username,
                'role' => 'karyawan',
            ];

            session()->set($data_session);

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => 'Registrasi Berhasil',
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('home');
            }
        } else {
            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Username telah digunakan',
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid Input');
            }
        }
    }
}
