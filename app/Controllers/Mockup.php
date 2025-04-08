<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Mockup extends BaseController
{
    public function index()
    {
        //
    }

    public function productDetail()
    {
        return view('mockup/product/detail');
    }
}
