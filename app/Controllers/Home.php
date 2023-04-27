<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $this->data['title'] = 'Dashboard';
        return $this->render('index');
    }
}
