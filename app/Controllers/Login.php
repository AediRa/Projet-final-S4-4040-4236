<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $num = $this->request->getPost('num');

        $userModel = new UserModel();
        $utilisateur = $userModel->where('num', $num)->first();

        if (! $utilisateur) {
            return redirect()->back()->with('error', 'Numéro de téléphone introuvable.');
        }

        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $utilisateur['id'],
            'user_nom'   => $utilisateur['nom'],
            'user_type'  => $utilisateur['type'],
        ]);

        if ($utilisateur['type'] === 'admin') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/home');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}