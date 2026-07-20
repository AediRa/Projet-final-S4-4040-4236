<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;

class Profil extends BaseController
{
    public function index()
    {
        $model = new UtilisateurModel();

        $utilisateur = $model->find(1);

        return view('profil', [
            'utilisateur' => $utilisateur
        ]);
    }
}