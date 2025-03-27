<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('user_username', $username)->first();

        if ($user && password_verify($password, $user['user_password'])) {
            $session->set([
                'user_id'  => $user['user_id'],
                'username' => $user['user_username'],
                'role'     => $user['user_role'],
                'logged_in' => true
            ]);
            return redirect()->to('/product');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
