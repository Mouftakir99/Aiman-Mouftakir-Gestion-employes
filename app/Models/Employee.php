<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'prenom', 'email', 'adresse', 'telephone', 'poste'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nom'     => 'required|max_length[100]',
        'prenom'  => 'required|max_length[100]',
        'email'   => 'required|is_unique[employees.email]',
        'adresse' => 'required',
        'telephone' => 'required',
        'poste'   => 'required|in_list[gerant,cuisiner,livreur]'
    ];
    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'le email est deja enregistrer'
        ],
        'poste' => [
            'in_list' => 'le poste doit etre gerant ou livreur, cuisiner.'
        ]
    ];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setTimestampsOnInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function setTimestampsOnInsert(array $data)
    {
        $currentTime = date('Y-m-d H:i:s'); // Get the current date and time
        $data['data']['created_at'] = $currentTime; // Set created_at
        $data['data']['updated_at'] = $currentTime; // Set updated_at

        return $data;
    }

    /**
     * Search employees by nom, prenom, email, and adresse.
     *
     * @param string|null $nom
     * @param string|null $prenom
     * @param string|null $email
     * @param string|null $adresse
     * @param string|null $telephone
     * @param string|null $poste
     * @return array
     */
    public function search($nom = null, $prenom = null, $email = null, $adresse = null, $telephone = null, $poste = null)
    {
        // Start building the query
        $builder = $this->db->table($this->table);
        $builder->select('employees.*');

        // Add filters based on provided parameters
        if (!empty($nom)) {
            $builder->like('employees.nom', '%' . $nom . '%');
        }
        if (!empty($prenom)) {
            $builder->like('employees.prenom', $prenom);
        }
        if (!empty($login)) {
            $builder->like('employees.email', $login);
        }
        if (!empty($adresse)) {
            $builder->like('employees.adresse', $adresse);
        }
        if (!empty($telephone)) {
            $builder->like('employees.telephone', $telephone);
        }
        if (!empty($poste)) {
            $builder->like('employees.poste', $poste);
        }

        // Execute the query and return results
        return $builder->get()->getResultArray();
    }
}
