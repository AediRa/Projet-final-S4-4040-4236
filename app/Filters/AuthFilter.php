<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Vérifie si l'utilisateur est bien connecté
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }

        // 2. Vérification des rôles (si un rôle est précisé dans les routes, ex: 'auth:user')
        if (! empty($arguments)) {
            $requiredRole = $arguments[0];
            
            // On récupère le type et on le passe en minuscules pour éviter les bugs ("Client" vs "client")
            $userRole = strtolower(session()->get('user_type') ?? '');

            // Si c'est un 'client', on l'assimile au rôle 'user' attendu par la route
            if ($userRole === 'client') {
                $userRole = 'user';
            }

            // Si le rôle ne correspond pas à la route demandée
            if ($userRole !== $requiredRole) {
                // Redirection selon son vrai rôle
                if ($userRole === 'admin') {
                    return redirect()->to('/admin');
                }
                return redirect()->to('/home');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien!!!
    }
}