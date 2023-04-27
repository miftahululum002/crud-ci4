<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'email',
        'number',
        'gender',
        'address',
    ];
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;
}
