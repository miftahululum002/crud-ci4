<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
                'null'              => false,
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'unique'            => true,
                'null'              => false,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => false,
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
                'unique'            => true,
            ],
            'id_group'  => [
                'type'              => 'INT',
                'null'              => false,
            ],
            'password'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '64',
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
            'last_login_at timestamp null',
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
