<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Employee;
use App\Models\Utilisateur;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        $utilisateur_model = new Utilisateur();
        // Fetch all users
        $administrateurs = $utilisateur_model->where('role', 'admin')->findAll();
        $utilisateurs = $utilisateur_model->where('role', 'user')->findAll();

        $employee_ùodel = new Employee();
        // Fetch all users
        $employees = $employee_ùodel->findAll();

        return view('admin/dashboard', [
            'admins' => $administrateurs,
            'users' => $utilisateurs,
            'employees' => $employees,
            'admins_count' => $utilisateur_model->where('role', 'admin')->countAllResults(),
            'gerants_count' => $employee_ùodel->where('poste', 'gerant')->countAllResults(),
            'livreurs_count' => $employee_ùodel->where('poste', 'livreur')->countAllResults(),
            'cuisiners_count' => $employee_ùodel->where('poste', 'cuisiner')->countAllResults(),
        ]);
    }
}
