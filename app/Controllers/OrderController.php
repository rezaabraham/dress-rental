<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class OrderController extends BaseController
{
    public function index()
    {

        return view('order/create');
    }

    public function create()
    {
        return view('order/create');
    }

    public function ajaxGetProducts()
    {
        $search = $this->request->getGet('term'); // dari Select2 search box
        $limit  = 10;

        $db = \Config\Database::connect();
        $builder = $db->table('master_product');

        $builder->select(
            "master_product_id as id,
            CONCAT(master_product_code,'-',master_product_name) as text"
        );
        $builder->where('master_product_isactive','y');

        if ($search) {
            $builder->like('master_product_name', $search);
            $builder->orLike('master_product_code', $search);
        }

        $builder->limit($limit);

        $query = $builder->get();
        $result = $query->getResultArray();

        return $this->response->setJSON(['results'=>$result]);
    }

    public function store()
    {
        $data = 
        [
            'order_itemid' => $this->request->getPost('selectedItem'),
            'order_tenant_name' => $this->request->getPost('name'),
            'order_tenant_address' => $this->request->getPost('address'),
            'order_date' => $this->request->getPost('orderDate'),
            'order_takendate' => $this->request->getPost('takenDate'),
            'order_returndate' => $this->request->getPost('returnDate'),
            'order_tenant_ktp' => $this->request->getFile('ktp'),
        ];

        $db = \Config\Database::connect();

        $db->table('order')->insert($data);

        return redirect()->to('order/create')->with('success','Berhasil menambahkan pesanan.');
    }
}
