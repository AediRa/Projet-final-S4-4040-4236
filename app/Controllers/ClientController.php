<?php

namespace App\Controllers;

class ClientController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Accueil',
            'id'    => session()->get('user_id'),
            'nom'   => session()->get('user_nom'),
            'type'  => session()->get('user_type'),
        ];
        return view('client/home', $data);
    }

    public function depot()
    {
        $data = [
            'title' => 'Dépôt',
            'nom'   => session()->get('user_nom'),
        ];
        return view('client/depot', $data);
    }

    public function retrait()
    {
        $data = [
            'title' => 'Retrait',
            'nom'   => session()->get('user_nom'),
        ];
        return view('client/retrait', $data);
    }

    public function transfert()
    {
        $data = [
            'title' => 'Transfert',
            'nom'   => session()->get('user_nom'),
        ];
        return view('client/transfert', $data);
    }

    public function historique()
    {
        $data = [
            'title' => 'Historique des Opérations',
            'nom'   => session()->get('user_nom'),
        ];
        return view('client/historique', $data);
    }
}