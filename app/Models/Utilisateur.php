<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
    protected $table            = 'utilisateurs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['nom', 'prenom', 'login', 'password', 'role']; // Fields that can be inserted/updated


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
    protected $validationRules      = [
        'nom'     => 'required|max_length[100]',
        'prenom'  => 'required|max_length[100]',
        'login'   => 'required|valid_email|is_unique[employees.email]',
        'role'   => 'required|in_list[user,admin]'
    ];
    protected $validationMessages   = [
        'role' => [
            'in_list' => 'le role doit etre soit admin ou user.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Search users by nom, prenom, login (username), and role.
     *
     * @param string|null $nom
     * @param string|null $prenom
     * @param string|null $login
     * @param string|null $role
     * @return array
     */
    public function search($nom = null, $prenom = null, $login = null, $role = null)
    {
        // Start building the query
        $builder = $this->db->table($this->table);
        $builder->select('utilisateurs.*');

        // Add filters based on provided parameters
        if (!empty($nom)) {
            $builder->like('utilisateurs.nom', $nom);
        }
        if (!empty($prenom)) {
            $builder->like('utilisateurs.prenom', $prenom);
        }
        if (!empty($login)) {
            $builder->like('utilisateurs.login', $login);
        }
        if (!empty($role)) {
            $builder->like('utilisateurs.role', $role);
        }

        // Execute the query and return results
        return $builder->get()->getResultArray();
    }
}
