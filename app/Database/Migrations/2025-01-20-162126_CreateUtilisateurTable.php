<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUtilisateurTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'login' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true, // Add unique constraint
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('utilisateurs');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateurs');
    }
}
