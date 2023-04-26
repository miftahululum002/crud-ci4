<?php

namespace App\Controllers;

use App\Models\Employee;

class Home extends BaseController
{
    public function index()
    {
        $employee = new Employee();
        $this->data['title'] = 'Employee';
        $this->data['employee'] = $employee->findAll();
        return $this->render('index');
    }
}
