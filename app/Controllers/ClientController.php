<?php

namespace App\Controllers;

use App\Models\MouvementModel;

class ClientController extends BaseController
{
    private function getSoldeUtilisateur(): int
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return 0;
        }

        $mouvementModel = new MouvementModel();
        return $mouvementModel->getSoldeClient((int)$userId);
    }

    private function mouvement(){
        $userId = session()->get('user_id'); 
        
        
    }

    public function index()
    {
        //session()->set(['user_id' => 5, 'user_nom' => 'luc_martin']);
        $data = [
            'title' => 'Accueil',
            'id'    => session()->get('user_id'),
            'nom'   => session()->get('user_nom'),
            'type'  => session()->get('user_type'),
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client/home', $data);
    }

    public function depot()
    {
        $data = [
            'title' => 'Dépôt',
            'nom'   => session()->get('user_nom'),
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client/depot', $data);
    }

    public function retrait()
    {
        $data = [
            'title' => 'Retrait',
            'nom'   => session()->get('user_nom'),
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client/retrait', $data);
    }

    public function transfert()
    {
        $data = [
            'title' => 'Transfert',
            'nom'   => session()->get('user_nom'),
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client/transfert', $data);
    }

    public function historique()
    {
        $data = [
            'title' => 'Historique des Opérations',
            'nom'   => session()->get('user_nom'),
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client/historique', $data);
    }


  public function epargne()
    {
        $data = [
            'solde' => $this->getSoldeUtilisateur(),
        ];
        return view('client', $data);
    }
}
