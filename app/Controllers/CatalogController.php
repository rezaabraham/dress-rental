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
        $perPage = 8; 

        $products = $this->productModel->getPaginatedProducts($perPage,$keyword,$brand);

        $brands = $this->brandModel->findAll();


        return view('catalog/index', [
            'products' => $products ,
            'brands' => $brands,
            'pager'  => $this->productModel->pager]);
    }
}
