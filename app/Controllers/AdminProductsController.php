<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\ColourModel;
use App\Models\SizeModel;
use App\Models\ProductImageModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminProductsController extends BaseController
{
    protected $productModel;
    protected $brandModel;
    protected $colourModel;
    protected $sizeModel;
    protected $productImageModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->brandModel = new BrandModel();
        $this->colourModel = new ColourModel();
        $this->sizeModel = new SizeModel();
        $this->productImageModel = new ProductImageModel();
    }

    public function index()
    {
        $keyword = esc($this->request->getGet('keyword'));

        $query = $this->productModel
        ->select('master_products.*, master_brands.brand_name,master_sizes.size_name,master_colours.colour_name')
        ->join('master_brands', 'master_products.product_brand = master_brands.brand_id', 'left')
        ->join('master_sizes', 'master_products.product_size = master_sizes.size_id', 'left')
        ->join('master_colours','master_products.product_colour = master_colours.colour_id', 'left')
        ->where('master_products.product_isactive','y');

        if (!empty($keyword)) {
            $query->like('master_products.product_name', $keyword);
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
            'sizes' => $sizes
        ];

        return view('products/create',$viewData);
    }

    public function store()
    {
        $validation = $this->validate([
            'product_name'          => 'required',
            'product_thumbnail'     => 'uploaded[product_thumbnail]|max_size[product_thumbnail,2048]|is_image[product_thumbnail]',
            'product_brand'         => 'required|integer',
            'product_colour'        => 'required|integer',
            'product_size'          => 'required|integer',
            // 'product_code'      => 'required|is_unique[master_products.product_code]',
            'product_price'     => 'required|decimal',
            'product_extra_days_price' => 'required|integer',
            'product_rental_period' => 'required|integer',
            // 'images.*'          => 'uploaded[images]|max_size[images,2048]|is_image[images]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $thumbnail = $this->request->getFile('product_thumbnail');

        if (isset($thumbnail)) {
            if($thumbnail->isValid() && !$thumbnail->hasMoved())
            {
                $newName = $thumbnail->getRandomName();
                $thumbnail->move('assets/media/products', $newName);
                $thumbnailUrl = 'media/products/'.$newName;
            }
        }

        $product_code = $this->productModel->generateProductCode();

        // Simpan produk
        $productData = [
            'product_name'          => $this->request->getPost('product_name'),
            'product_thumbnail'     => $thumbnailUrl,
            'product_code'          => $product_code,
            'product_brand'         => $this->request->getPost('product_brand'),
            'product_desc'          => $this->request->getPost('product_description'),
            'product_colour'        => $this->request->getPost('product_colour'),
            'product_size'          => $this->request->getPost('product_size'),
            'product_price'         => $this->request->getPost('product_price'),
            'product_extra_days_price' => $this->request->getPost('product_extra_days_price'),
            'product_rental_period' => $this->request->getPost('product_rental_period')
        ];

        $this->productModel->insert($productData);
        $productId = $this->productModel->getInsertID();
        

        return $this->response->setJSON(['success' => true, 'product_id' => $productId]);
    }

    public function uploadGallery($productId)
    {
        $images = $this->request->getFiles();

        if ($images && isset($images['file'])) {
            foreach ($images['file'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('assets/media/products', $newName);
                    
                    $this->productImageModel->insert([
                        'product_id' => $productId,
                        'image_url'  => 'media/products/' . $newName,
                    ]);
                }
            }
        }

        return $this->response->setJSON(['success' => true]);
    }
}
