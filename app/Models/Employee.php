<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee extends Model
{
    protected $table            = 'employee';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'nim',
        'gender',
        'address',
    ];
    // protected $returnType    = \App\Entities\Employee::class;
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;
}
