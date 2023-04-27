<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_group' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
                'null'              => false,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'unique'            => true,
                'null'              => false,
            ],
            'description' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true,
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
        $this->forge->addKey('id_group', true);
        $this->forge->createTable('user_group');
    }

    public function down()
    {
        $this->forge->dropTable('user_group');
    }
}
