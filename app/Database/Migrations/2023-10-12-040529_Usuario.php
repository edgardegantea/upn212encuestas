<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Usuario extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rol'               => ['type' => 'varchar', 'constraint' => 20, 'default' => "estudiante"],
            'codigo'            => ['type' => 'varchar', 'constraint' => 15, 'unique' => true, 'null' => true, 'blank' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 100],
            'apaterno'          => ['type' => 'varchar', 'constraint' => 50],
            'amaterno'          => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'curp'              => ['type' => 'varchar', 'constraint' => 18, 'null' => true, 'unique' => true],
            'username'          => ['type' => 'varchar', 'constraint' => 50, 'unique' => true],
            'email'             => ['type' => 'varchar', 'constraint' => 100, 'unique' => true],
            'telefono'          => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
            'password'          => ['type' => 'varchar', 'constraint' => 255],
            'sexo'              => ['type' => 'varchar', 'constraint' => 10],
            'fechaNacimiento'   => ['type' => 'datetime', 'null' => true],
            'adscripcion'       => ['type' => 'varchar', 'constraint' => 50],
            'carrera'           => ['type' => 'tinyint', 'default' => 1],
            'status'            => ['type' => 'varchar', 'constraint' => 20, 'default' => 'activo'],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('usuarios', true);
    }
}
