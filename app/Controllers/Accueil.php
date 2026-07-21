<?php

namespace App\Controllers;

class Accueil extends BaseController
{
    public function index()
    {
        $data['utilisateur'] = [
            'nom'   => session()->get('user_nom') ?? 'Invité',
        ];

        return view('accueil');
    }
}