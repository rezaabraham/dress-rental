<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\BrandModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CatalogController extends BaseController
{
    protected $productModel;
    protected $productImageModel;
    protected $brandModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->brandModel = new BrandModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $brand = $this->request->getGet('brand');
        $perPage = 6; 

        /* $query = $this->productModel
        ->select('master_products.*, master_brands.brand_name,master_sizes.size_name')
        ->where('master_products.product_isactive','y')
        ->join('master_brands', 'master_products.product_brand = master_brands.brand_id', 'left')
        ->join('master_sizes', 'master_products.product_size = master_sizes.size_id', 'left'); */

        $query = $this->productModel
        ->where('master_product.master_product_isactive','y')
        ->join('master_brands', 'master_product.master_product_brand = master_brands.brand_id', 'left')
        ->join('master_attire_type', 'master_product.master_product_type = master_attire_type.master_attire_type_id', 'left')
        ->join('master_tag', 'master_product.master_product_tag = master_tag.master_tag_id', 'left');

        if (!empty($keyword)) {
            $query->like('master_product.master_product_name', $keyword);
        }

        if (!empty($brand)) {
            $query->where('master_product.master_product_brand', $brand);
        }

        $products = $query->findAll();

        $brands = $this->brandModel->findAll();


        return view('catalog/index', ['products' => $products,'brands' => $brands]);
    }
}
