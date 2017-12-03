<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 22/11/17
 * Time: 07:17
 */

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('Security/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
}