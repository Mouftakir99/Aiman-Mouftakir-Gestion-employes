<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        // Load the database helper
        helper('text');

        // Define user data
        $data = [
            [
                'nom' => 'Admin',
                'role' => 'admin',
                'prenom' => 'LTE',
                'login'    => 'admin@admin.com',
                'password' => password_hash('password', PASSWORD_DEFAULT), // Hash the password
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'User',
                'role' => 'user',
                'prenom' => 'LTE',
                'login'    => 'user@user.com',
                'password' => password_hash('password', PASSWORD_DEFAULT), // Hash the password
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the 'users' table
        $this->db->table('utilisateurs')->insertBatch($data);
    }
}
