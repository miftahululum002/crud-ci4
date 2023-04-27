<?php

namespace App\Controllers;

use App\Models\Employee;
use \Config\Services;

class Employees extends BaseController
{
    private $employee = null;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function index()
    {
        $this->data['title'] = 'Employee';
        $this->data['employees'] = $this->employee->findAll();
        return $this->render('index');
    }

    public function add()
    {
        $title = 'Tambah Pegawai';
        $this->data['title'] = $title;
        return $this->render('add');
    }

    public function store()
    {
        $validation = Services::validation();
        $validation->setRule('username', 'Username', 'required|min_length[3]');
        $validation->setRule('name', 'name', "required");
        $validation->setRule('nim', 'nim', 'required');
        $validation->setRule('gender', 'gender', 'required|in_list[Laki-laki,Perempuan]');
        $validation->setRule('address', 'address', 'required');

        $validate = $validation->run();
        if (!$validate) {
            $errors = $validation->getErrors();
            $this->data['errors'] = $errors;
            redirect('employees/add');
        }
        $formData = $this->request->getPost();
        $data = $formData;
        $store = $this->employee->insert($data);
        if ($store) {
            $this->session->setFlashdata('success', 'Tambah pegawai berhasil');
            redirect('employees');
        } else {
            $this->session->setFlashdata('error', 'Tambah pegawai gagal');
            redirect('employees/add');
        }
    }
}
