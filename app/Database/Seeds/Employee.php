<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Employee extends Seeder
{
    public function run()
    {
        $data = [
            'name'      => 'Employee 1',
            'email'     => 'employee1@gmail.com',
            'id_user'   => 3,
            'gender'    => 'Laki-laki',
            'number'    => 'EMP0001',
            'address'   => 'Malang City, East Java',
        ];

        $this->db->table('employees')->insertBatch($data);
    }
}
