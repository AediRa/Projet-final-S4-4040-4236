<?php

namespace App\Models;

use CodeIgniter\Model;

class MouvementModel extends Model
{
    protected $table = 'mouvement';

    /**
     * Calcule le solde réel d'un client à partir de la BD
     */
    public function getSoldeClient(int $userId): int
    {
        $db = \Config\Database::connect();

        // 1. Somme des Dépôts
        $depots = $db->table('mouvement')
                     ->selectSum('montant')
                     ->where('id_client', $userId)
                     ->where('type', 'depot')
                     ->get()->getRow()->montant ?? 0;

        // 2. Somme des Retraits
        $retraits = $db->table('mouvement')
                      ->selectSum('montant')
                      ->where('id_client', $userId)
                      ->where('type', 'retrait')
                      ->get()->getRow()->montant ?? 0;

        // 3. Somme des Transferts Reçus
        $transfertsRecus = $db->table('transfert')
                              ->selectSum('montant')
                              ->where('id_client_dest', $userId)
                              ->get()->getRow()->montant ?? 0;

        // 4. Somme des Transferts Envoyés
        $transfertsEnvoyes = $db->table('transfert')
                               ->selectSum('montant')
                               ->where('id_client', $userId)
                               ->get()->getRow()->montant ?? 0;

        // Solde = (Entrées) - (Sorties)
        return ($depots + $transfertsRecus) - ($retraits + $transfertsEnvoyes);
    }
}