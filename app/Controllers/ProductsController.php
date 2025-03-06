<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\BrandModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductsController extends BaseController
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
        //
    }

    public function show($code = null)
    {
        $product = $this->productModel
        ->select('master_products.*, master_brands.brand_name,master_sizes.size_name')
        ->join('master_brands', 'master_products.product_brand = master_brands.brand_id', 'left')
            ->join('master_sizes', 'master_products.product_size = master_sizes.size_id', 'left')
            ->where('product_code', $code)->first();
        if (!$product) {
            return redirect()->to('/products')->with('error', 'Produk tidak ditemukan.');
        }

        $product['images'] = $this->productImageModel
            ->where('product_id', $product['product_id'])
            ->findColumn('image_url') ?? [];

        return view('products/detail', ['product' => $product]);
    }
}
