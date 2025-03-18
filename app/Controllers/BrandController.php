<?php

namespace App\Controllers;

use App\Models\BrandModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BrandController extends BaseController
{

    protected $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
    }

    public function index()
    {
        $keyword = esc($this->request->getGet('keyword'));

        $query = $this->brandModel;

        if (!empty($keyword)) {
            $query->like('master_brands.brand_name', $keyword)->orLike('master_brands.brand_code',$keyword);
        }

        $brands = $query->findAll();

        return view('brands/list',['brands' => $brands]);
    }

    public function store()
    {
        if($this->request->isAJAX())
        {
            $brandModel = new BrandModel();

            $data = $this->request->getJSON();

            $validationRules = [
                'brand_name' => 'required|min_length[3]|is_unique[master_brands.brand_name]',
                'brand_code' => 'required|alpha_numeric|min_length[2]|max_length[10]|is_unique[master_brands.brand_code]'
            ];

            $validationMessages = [
                'brand_name' => [
                    'required'   => 'Nama brand wajib diisi.',
                    'min_length' => 'Nama brand minimal 3 karakter.',
                    'is_unique'  => 'Nama brand sudah digunakan.'
                ],
                'brand_code' => [
                    'required'   => 'Kode brand wajib diisi.',
                    'alpha_numeric' => 'Kode brand hanya boleh berisi huruf dan angka.',
                    'min_length' => 'Kode brand minimal 2 karakter.',
                    'max_length' => 'Kode brand maksimal 10 karakter.',
                    'is_unique'  => 'Kode brand sudah digunakan.'
                ]
            ];

            if (!$this->validate($validationRules, $validationMessages)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $this->validator->getErrors()
                ]);
            }

            $brandId = $brandModel->insert([
                'brand_name' => trim($data->brand_name),
                'brand_code' => trim($data->brand_code)
            ]);
    
            return $this->response->setJSON([
                'success' => true,
                'brand_id' => $brandId,
                'brand_name' => $data->brand_name
            ]);
        }

        return $this->response->setStatusCode(400);
    }
}
