<?php

namespace App\Controllers;

use App\Models\Employee;

class Employees extends BaseController
{

    public function index()
    {
        $employee = new Employee();
        $this->data['title'] = 'Employee';
        $this->data['employees'] = $employee->findAll();
        return $this->render('index');
    }

    public function add()
    {
        $title = 'Tambah Pegawai';
        $this->data['title'] = $title;
        return $this->render('add');
    }
}
