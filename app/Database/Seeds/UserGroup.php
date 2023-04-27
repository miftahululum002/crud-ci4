<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserGroup extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_group'      => 1,
                'name'          => 'Super User',
                'description'  => 'Role user for super user (root)',
            ],
            [
                'id_group'      => 2,
                'name'          => 'Management',
                'description'  => 'Role user for management (admin)',
            ],
            [
                'id_group'      => 3,
                'name'          => 'Employee',
                'description'  => 'Role user for user (employee)',
            ],
        ];

        // Using Query Builder
        $this->db->table('user_group')->insertBatch($data);
    }
}
