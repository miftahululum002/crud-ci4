<?php

namespace App\Controllers;


class Uji extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $instance = generateEmployeeNumber();
        echo '<pre>';
        print_r($instance);
        echo '</pre>';
        die;
    }
}
