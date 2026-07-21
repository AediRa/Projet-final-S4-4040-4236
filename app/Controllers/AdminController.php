<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Espace Admin - Accueil',
            'id'    => session()->get('user_id'),
            'nom'   => session()->get('user_nom'),
            'type'  => session()->get('user_type'),
        ];

        return view('admin/dashboard', $data);
    }

    public function prefixes()
    {
        return view('admin/prefixes', ['title' => 'Configurations - Préfixes']);
    }

    public function typesOperation()
    {
        return view('admin/types_operation', ['title' => 'Configurations - Types d\'opération']);
    }

    public function frais()
    {
        return view('admin/frais', ['title' => 'Gains de frais']);
    }

    public function clients()
    {
        return view('admin/clients', ['title' => 'Nos clients']);
    }
}