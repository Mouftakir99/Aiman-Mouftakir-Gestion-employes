<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Load the database helper
        helper('text');

        // Define user data
        $data = [
            [
                'nom' => 'Gerant',
                'prenom' => 'A.D.M',
                'email'    => 'gerant@admin.com',
                'adresse'    => 'adresse gerant 1',
                'telephone'    => '+2126********',
                'poste'    => 'gerant',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'Gerant 2',
                'prenom' => 'A.D.M',
                'email'    => 'gerant2@admin.com',
                'adresse'    => 'adresse gerant 2',
                'telephone'    => '+2126********',
                'poste'    => 'gerant',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'Gerant 3',
                'prenom' => 'A.D.M',
                'email'    => 'gerant3@admin.com',
                'adresse'    => 'adresse gerant 3',
                'telephone'    => '+2126********',
                'poste'    => 'gerant',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'Livreur',
                'prenom' => 'A.D.M',
                'email'    => 'livreur@admin.com',
                'adresse'    => 'adresse livreur 1',
                'telephone'    => '+2126********',
                'poste'    => 'livreur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'Livreur 2',
                'prenom' => 'A.D.M',
                'email'    => 'livreur2@admin.com',
                'adresse'    => 'adresse livreur 2',
                'telephone'    => '+2126********',
                'poste'    => 'livreur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'Cuisiner',
                'prenom' => 'A.D.M',
                'email'    => 'cuisiner@admin.com',
                'adresse'    => 'adresse cuisiner 3',
                'telephone'    => '+2126********',
                'poste'    => 'cuisiner',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the 'users' table
        $this->db->table('employees')->insertBatch($data);
    }
}
