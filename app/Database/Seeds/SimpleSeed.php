<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SimpleSeed extends Seeder
{
    public function run()
    {
        $this->call('UserGroup');
        $this->call('User');
        $this->call('Employee');
    }
}
