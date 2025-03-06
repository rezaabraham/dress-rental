<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\ColourModel;
use App\Models\SizeModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminProductsController extends BaseController
{
    protected $productModel;
    protected $brandModel;
    protected $colourModel;
    protected $sizeModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->brandModel = new BrandModel();
        $this->colourModel = new ColourModel();
        $this->sizeModel = new SizeModel();
    }

    public function create()
    {
        $brands = $this->brandModel->findAll();
        $colours = $this->colourModel->findAll();
        $sizes = $this->sizeModel->findAll();

        $viewData = [
            'brands' => $brands,
            'colours' => $colours,
            'sizes' => $sizes
        ];

        return view('layouts/admin/product/create',$viewData);
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

        // Simpan produk
        $productData = [
            'product_name'          => $this->request->getPost('product_name'),
            'product_thumbnail'     => $thumbnailUrl,
            'product_code'          => 'BB-'.date('is'),
            'product_brand'         => $this->request->getPost('product_brand'),
            'product_desc'          => $this->request->getPost('product_description'),
            'product_colour'        => $this->request->getPost('product_colour'),
            'product_size'          => $this->request->getPost('product_size'),
            'product_price'         => $this->request->getPost('product_price'),
            'product_extra_days_price' => $this->request->getPost('product_extra_days_price'),
            'product_rental_period' => $this->request->getPost('product_rental_period')
            // 'product_rent_days' => $this->request->getPost('product_rent_days'),
            // 'product_desc'      => $this->request->getPost('product_desc'),
        ];

        //dd($productData);

        $this->productModel->insert($productData);
        //$productId = $this->productModel->getInsertID();

        // Upload dan simpan gambar
        /* $images = $this->request->getFiles();
        if ($images && isset($images['images'])) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('uploads/products', $newName);

                    $this->productImageModel->insert([
                        'product_id' => $productId,
                        'image_url'  => 'uploads/products/' . $newName,
                    ]);
                }
            }
        } */

        return redirect()->to('/admin/product/create')->with('success', 'Produk berhasil ditambahkan.');
        //echo 'Sukses';
    }
}
