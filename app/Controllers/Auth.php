<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        $data['title'] = 'Login - NexaStore';
        return view('auth/login', $data);
    }

    public function login()
    {
        $model = new UserModel();
        $email = $this-> request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'user_id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ]);
            return redirect()->to('/dashboard');
        }
        return redirect()->to('/login')->with('error', 'Invalid email or password.');
    }
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        $data['title'] = 'Register - NexaStore';
        return view('auth/register', $data);
    }

    public function registerUser()
    {
        $model = new UserModel();

        $data = [
            'name'  =>$this->request->getPost('name'),
            'email' =>$this->request->getPost('email'),
            'phone' =>$this->request->getPost('phone'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user',
        ];

        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Account created! Please login.');
        }

        return redirect ()->to('/register') ->with('error', 'Registration failed. Email may allready exist.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully.');
    }
}
