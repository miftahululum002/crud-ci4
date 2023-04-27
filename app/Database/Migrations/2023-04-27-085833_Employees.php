<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
                'null'              => false,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => false,
            ],
            'number' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => false,
                'unique'            => true,
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => false,
                'unique'            => true,
            ],
            'address' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'gender'    => [
                'type'              => 'ENUM',
                'constraint'        => ['Laki-laki', 'Perempuan'],
                'null'              => false,
                'default'           => 'Laki-laki',
            ],
            'id_user'   => [
                'type'              => 'int',
                'null'              => false,
            ],
            'is_active' => [
                'type'              => 'ENUM',
                'constraint'        => ['1', '0'],
                'null'              => false,
                'default'           => '1',
            ],
            'created_at timestamp not null default current_timestamp',
            'created_by' => [
                'type'              => 'INT',
                'null'              => true,
            ],
            'updated_at timestamp null on update current_timestamp',
            'updated_by' => [
                'type'              => 'INT',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
