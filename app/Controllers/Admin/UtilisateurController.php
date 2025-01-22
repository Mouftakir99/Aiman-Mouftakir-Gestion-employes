<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Utilisateur;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class UtilisateurController extends BaseController
{
    protected $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        // Fetch all users
        $data['users'] = $this->utilisateur->findAll();

        // Pass data to a view
        return view('admin/utilisateurs', $data);
    }

    public function store()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }


        if (!$this->validate($this->utilisateur->validationRules, $this->utilisateur->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->utilisateur->save($this->request->getPost());
        return redirect()->back()->with('success', 'Utilisateurs a été ajouter avec succès');
    }

    /**
     * Search users by nom, prenom, login (username), and role.
     *
     * @param string|null $nom
     * @param string|null $prenom
     * @param string|null $login
     * @param string|null $role
     * @return array
     */
    public function search()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        $data['users'] = $this->utilisateur->search($this->request->getGet('nom'), $this->request->getGet('prenom'), $this->request->getGet('login'), $this->request->getGet('role'));

        return view('admin/utilisateurs', $data);

    }

    public function update($id)
    {
        // Update validation rule for unique login
        $this->utilisateur->setValidationRule('login', "required|is_unique[utilisateurs.login,id,{$id}]");
        if (!$this->validate($this->utilisateur->validationRules, $this->utilisateur->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->utilisateur->update($id, $this->request->getPost());
        return redirect()->back()->with('success', 'Utilisateur a été modifier avec succès');
    }

    public function delete($id)
    {
        $this->utilisateur->delete($id);
        return redirect()->back()->with('success', 'Utilisateur a été supprimer avec succès');
    }
}
