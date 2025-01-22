<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Utilisateur;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
   public function login()
   {
       return view('auth/login');
   }

    // Handle the login form submission
    public function attemptLogin()
    {
        $session = session();
        $utilisateurs = new Utilisateur();

        // Get form data
        $email = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        // Find the user by email
        $user = $utilisateurs->where('login', $email)->first();

        if ($user) {
            if ($user['role'] === 'admin') {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Set user session data
                    $user['isLoggedIn'] = true;
                    $session->set($user);
                    return redirect()->to('/admin/dashboard');
                }
            }
            else {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Set user session data
                    $user['isLoggedIn'] = true;
                    $session->set($user);
                    return redirect()->to('/dashboard');
                }
            }
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withInput()->with('error', 'Email ou mot de passe incorrect.');
    }

    // Logout method
    public function logout() {
        // Destroy session
        session()->destroy();
        return redirect('admin/login');
    }
}
