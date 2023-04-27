<?php

namespace App\Controllers;

use App\Models\Employee;

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
        $lastNumber = generateEmployeeNumber();
        $this->data['last_number'] = $lastNumber;
        $validation = \Config\Services::validation();
        $this->data['validation'] = $validation;
        return $this->render('add');
    }

    public function store()
    {
        $rules = [
            'name' => [
                'label' => 'Nama',
                'rules' => "required"
            ],
            'email' => [
                'label' => 'Email',
                'rules' => "required|valid_email|is_unique[user.email]|is_unique[employees.email]"
            ],
            'number' => [
                'label' => 'No Pegawai',
                'rules' => 'required|is_unique[employees.number]'
            ],
            'gender' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required|in_list[Laki-laki,Perempuan]'
            ],
            'address' => [
                'label' => 'Alamat',
                'rules' => 'required'
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = \Config\Services::validation();
            dd($errors);
            return redirect()->to('employees/add')->withInput()->with('validation', $errors);
        }
        $formData = $this->request->getPost();
        $data = $formData;
        $data['number'] = generateEmployeeNumber();
        $store = $this->employee->insert($data);
        if ($store) {
            session()->setFlashdata('success', 'Tambah pegawai berhasil');
            redirect('employees');
        } else {
            session()->setFlashdata('error', 'Tambah pegawai gagal');
            redirect('employees/add');
        }
    }
}
