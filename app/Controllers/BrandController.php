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

    /* public function index()
    {
        $keyword = esc($this->request->getGet('keyword'));

        $query = $this->brandModel->where('brand_isactive','y');

        if (!empty($keyword)) {
            $query->like('master_brands.brand_name', $keyword)->orLike('master_brands.brand_code',$keyword);
        }

        $brands = $query->findAll();

        return view('brands/list',['brands' => $brands]);
    } */

    public function index()
    {
        $brandModel = new \App\Models\BrandModel();

        $keyword = $this->request->getGet('keyword');

        $perPage = 5; // Jumlah data per halaman

        $data = [
            'brands' => $brandModel->getPaginatedBrands($perPage, $keyword),
            'pager'  => $brandModel->pager,
            'keyword' => $keyword
        ];

        return view('brands/list', $data);
    }

    /* public function store()
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
    } */
    public function store()
    {
        if ($this->request->isAJAX()) {
            // Validasi Input
            $validationRules = [
                'brand_name' => 'required|min_length[3]|is_unique[master_brands.brand_name]',
                'brand_code' => 'required|alpha_numeric|min_length[2]|max_length[10]|is_unique[master_brands.brand_code]'
            ];
    
            $validationMessages = [
                'brand_name' => [
                    'required'   => 'Nama brand tidak boleh kosong.',
                    'min_length' => 'Nama brand minimal 3 karakter.',
                    'is_unique'  => 'Nama brand sudah digunakan.'
                ],
                'brand_code' => [
                    'required'   => 'Kode brand tidak boleh kosong.',
                    'alpha_numeric' => 'Kode brand hanya boleh berisi huruf dan angka.',
                    'min_length' => 'Kode brand minimal 2 karakter.',
                    'max_length' => 'Kode brand maksimal 10 karakter.',
                    'is_unique'  => 'Kode brand sudah digunakan.'
                ]
            ];
    
            // Jika validasi gagal, kirim JSON error
            if (!$this->validate($validationRules, $validationMessages)) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors()
                ]);
            }
    
            // Simpan data ke database
            $brandModel = new \App\Models\BrandModel();
            $brandId = $brandModel->insert([
                'brand_name' => $this->request->getPost('brand_name'),
                'brand_code' => $this->request->getPost('brand_code')
            ]);
    
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Brand berhasil ditambahkan.',
                'brand_id' => $brandId
            ]);
        }
    
        // Jika request bukan AJAX, redirect kembali dengan pesan
        return redirect()->to('/brands')->with('error', 'Permintaan tidak valid.');
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $validationRules = [
                'brand_name' => "required|min_length[3]|is_unique[master_brands.brand_name,brand_id,{$id}]",
                'brand_code' => "required|alpha_numeric|min_length[2]|max_length[10]|is_unique[master_brands.brand_code,brand_id,{$id}]"
            ];

            $validationMessages = [
                'brand_name' => [
                    'required'   => 'Nama brand tidak boleh kosong.',
                    'min_length' => 'Nama brand minimal 3 karakter.',
                    'is_unique'  => 'Nama brand sudah digunakan.'
                ],
                'brand_code' => [
                    'required'   => 'Kode brand tidak boleh kosong.',
                    'alpha_numeric' => 'Kode brand hanya boleh berisi huruf dan angka.',
                    'min_length' => 'Kode brand minimal 2 karakter.',
                    'max_length' => 'Kode brand maksimal 10 karakter.',
                    'is_unique'  => 'Kode brand sudah digunakan.'
                ]
            ];

            // Jika validasi gagal, kirim response JSON dengan error messages
            if (!$this->validate($validationRules, $validationMessages)) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors'  => $this->validator->getErrors()
                ]);
            }

            $brandModel = new \App\Models\BrandModel();

            // Cek apakah brand dengan ID tersebut ada
            if (!$brandModel->find($id)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Brand tidak ditemukan.'
                ]);
            }

            // Lakukan update
            $brandModel->update($id, [
                'brand_name' => $this->request->getPost('brand_name'),
                'brand_code' => $this->request->getPost('brand_code')
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Brand berhasil diperbarui.'
            ]);
        }

        return redirect()->to('/brands')->with('error', 'Permintaan tidak valid.');
    }

    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $brandModel = new \App\Models\BrandModel();

            // Cek apakah brand dengan ID ini ada
            $brand = $brandModel->find($id);
            if (!$brand) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Brand tidak ditemukan.'
                ]);
            }

            // Update isactive menjadi 'n'
            $brandModel->update($id, ['brand_isactive' => 'n']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Brand berhasil dihapus.'
            ]);
        }

        return redirect()->to('brand')->with('error', 'Permintaan tidak valid.');
    }
}
