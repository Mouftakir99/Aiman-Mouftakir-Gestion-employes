<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Employee;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
    protected $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function index()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        $data['employees'] = $this->employee->findAll();
        return view('admin/employees', $data);
    }

    public function store()
    {
        if (!$this->validate($this->employee->validationRules, $this->employee->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->employee->save($this->request->getPost());
        return redirect()->back()->with('success', 'Employee a été ajouter avec succès');
    }

    /**
     * Search employees.
     *
     * @return array
     */
    public function search()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/admin/login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        $data['employees'] = $this->employee->search(
            $this->request->getGet('nom'),
            $this->request->getGet('prenom'),
            $this->request->getGet('email'),
            $this->request->getGet('adresse'),
            $this->request->getGet('telephone'),
            $this->request->getGet('poste')
        );

        return view('admin/employees', $data);
    }

    public function update($id)
    {
        // Update validation rule for unique email
        $this->employee->setValidationRule('email', "required|is_unique[employees.email,id,{$id}]");
        if (!$this->validate($this->employee->validationRules, $this->employee->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->employee->update($id, $this->request->getPost());
        return redirect()->back()->with('success', 'Employee a été modifier avec succès');
    }

    public function delete($id)
    {
        $this->employee->delete($id);
        return redirect()->back()->with('success', 'Employee a été supprimer avec succès');
    }
}
