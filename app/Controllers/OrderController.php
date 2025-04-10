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

    public function ajaxGetProducts()
    {
        $search = $this->request->getGet('term'); // dari Select2 search box
        $limit  = 10;

        $db = \Config\Database::connect();
        $builder = $db->table('master_product');

        $builder->select("master_product_id as id,CONCAT(master_product_code,'-',master_product_name) as text");
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
}
