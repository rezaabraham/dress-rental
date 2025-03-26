<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\BrandModel;
use App\Models\SizeModel;
use App\Models\ColourModel;
use App\Models\TmpProductModel;
use App\Models\TmpProductImageModel;


use App\Controllers\BaseController;
// use CodeIgniter\HTTP\ResponseInterface;

class ProductsController extends BaseController
{
    protected $productModel;
    protected $productImageModel;
    protected $brandModel;
    protected $sizeModel;
    protected $colourModel;
    protected $tmpProductModel;
    protected $tmpProductImageModel;


    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->brandModel = new BrandModel();
        $this->sizeModel = new SizeModel();
        $this->colourModel = new ColourModel();
        $this->tmpProductModel = new TmpProductModel();
        $this->tmpProductImageModel = new TmpProductImageModel();
    }

    public function index()
    {
        $keyword = esc($this->request->getGet('keyword'));

        $query = $this->productModel
        ->select('master_product.*, master_brands.brand_name')
        ->join('master_brands', 'master_product.master_product_brand = master_brands.brand_id', 'left')
        ->where('master_product.master_product_isactive','y');

        if (!empty($keyword)) {
            $query->like('master_product.master_product_name', $keyword);
        }

        $products = $query->findAll();

        return view('products/list',['products' => $products]);
    }

    public function create()
    {
        $brands = $this->brandModel->where('brand_isactive','y')->findAll();
        $colours = $this->colourModel->findAll();
        $sizes = $this->sizeModel->findAll();

        $viewData = [
            'brands' => $brands,
            'colours' => $colours,
            'sizes' => $sizes,
            'formCode' => date('Ymdhis')
        ];

        return view('products/create',$viewData);
    }

    public function store()
    {
        $validation = $this->validate([
            'product_thumbnail' => 'uploaded[product_thumbnail]|max_size[product_thumbnail,2048]|is_image[product_thumbnail]',
            'product_category' => 'required|integer',
            'product_brand' => 'required|integer',
            'product_colour' => 'required',
            'product_size' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_images' => 'uploaded[product_images]|max_size[product_images,2048]|is_image[product_images]',
            'product_price' => 'required|decimal',
            'product_rental_period' => 'required|integer',
            'product_extra_days_price' => 'required|decimal'
        ]);

        if(!$validation)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $product_code = $this->productModel->generateProductCode();

        $thumbnail = $this->request->getFile('product_thumbnail');

        if (isset($thumbnail)) 
        {
            if($thumbnail->isValid() && !$thumbnail->hasMoved())
            {
                $folder = 'assets/userdata/products/'.$product_code;

                if (!is_dir($folder)) {
                    mkdir($folder, 0755, true);
                }

                $newName = $thumbnail->getRandomName();
                $thumbnail->move($folder, $newName);
            }
        }

        $productData = [
            'master_product_name'          => $this->request->getPost('product_name'),
            'master_product_thumbnail'     => $newName,
            'master_product_code'          => $product_code,
            'master_product_category'      => $this->request->getPost('product_category'),
            'master_product_brand'         => $this->request->getPost('product_brand'),
            'master_product_desc'          => $this->request->getPost('product_description'),
            'master_product_colour'        => implode(',', $this->request->getPost('product_colour')),
            'master_product_size'          => implode(',', $this->request->getPost('product_size')),
            'master_product_price'         => $this->request->getPost('product_price'),
            'master_product_extra_days_price' => $this->request->getPost('product_extra_days_price'),
            'master_product_rental_period' => $this->request->getPost('product_rental_period')
        ];

        $this->productModel->insert($productData);
        $productID = $this->productModel->getInsertID();

        $this->uploadMedia($folder,$productID);

        return redirect()->back()->with('success','Item berhasil ditambahkan.');
    }

    private function uploadMedia($folder,$productID)
    {
        $images = $this->request->getFiles();

        if ($images && isset($images['product_images'])) {
            foreach ($images['product_images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move($folder, $newName);
                    
                    $this->productImageModel->insert([
                        'master_product_image_name' => $newName,
                        'master_product_image_productid' => $productID,
                        'master_product_image_createdby' => session()->get('username')
                    ]);
                }
            }
        }

        return true;
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

        return view('catalog/product', ['product' => $product]);
    }

    public function delete($id = null)
    {
        $productModel = new ProductModel();

        if ($productModel->find($id)) {
            $productModel->update($id, ['product_isactive' => 'n']);
            return $this->response->setJSON(['success' => true, 'message' => 'Produk berhasil dinonaktifkan.']);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Produk tidak ditemukan.']);
    }

}
