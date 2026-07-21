<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'Veuillez vous connecter.');
        }

        if (! empty($arguments)) {
            $requiredRole = $arguments[0];
            $userRole     = session()->get('user_type');

            if ($userRole === 'client') {
                $userRole = 'user';
            }

            if ($userRole !== $requiredRole) {

                if ($userRole === 'admin') {
                    return redirect()->to('/admin');
                }
                return redirect()->to('/home');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire ici
    }
}