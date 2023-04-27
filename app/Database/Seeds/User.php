<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'   => 1,
                'name'      => 'Admin Super User',
                'username'  => 'uadmin',
                'email'     => 'uadmin@gmail.com',
                'password'  => hash(DEFAULT_HASH, DEFAULT_PASSWORD),
                'id_group'  => 1,
            ],
            [
                'id_user'   => 2,
                'name'      => 'Management 1',
                'username'  => 'management1',
                'email'     => 'management1@gmail.com',
                'password'  => hash(DEFAULT_HASH, DEFAULT_PASSWORD),
                'id_group'  => 2,
            ],
            [
                'id_user'   => 3,
                'name'      => 'Employee 1',
                'username'  => 'employee1',
                'email'     => 'employee1@gmail.com',
                'password'  => hash(DEFAULT_HASH, DEFAULT_PASSWORD),
                'id_group'  => 3,
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
