<?php

namespace App\Controllers;

use App\Models\Employee;

class Home extends BaseController
{
    private $employee = null;
    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function index()
    {
        $this->data['title'] = 'Dashboard';
        $this->data['count_employee'] = $this->employee->countAllResults();
        return $this->render('index');
    }
}
