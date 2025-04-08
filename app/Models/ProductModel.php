<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'master_product';
    protected $primaryKey = 'master_product_id';
    protected $allowedFields = [
        'master_product_name', 
        'master_product_code', 
        'master_product_colour', 
        'master_product_size',
        'master_product_type',
        'master_product_brand', 
        'master_product_price', 
        'master_product_rent_days', 
        'master_product_desc',
        'master_product_thumbnail',
        'master_product_extra_days_price',
        'master_product_rental_period',
        'master_product_isactive',
        'master_product_tag'
    ];
    protected $returnType = 'array';

    public function generateProductCode()
    {
        $query = $this->select('LPAD(IFNULL(MAX(master_product_id),0) + 1, 3, "0") AS new_code', false)
                      ->first();
        
        return $query ? $query['new_code'] : '001';
    }

    public function getPaginatedProducts($perPage, $keyword = null, $brand = null)
    {
        $query = $this->where('master_product_isactive', 'y')
        ->join('master_brands', 'master_product.master_product_brand = master_brands.brand_id', 'left')
        ->join('master_attire_type', 'master_product.master_product_type = master_attire_type.master_attire_type_id', 'left')
        ->join('master_tag', 'master_product.master_product_tag = master_tag.master_tag_id', 'left');

        if (!empty($keyword)) {
            $query->like('master_product.master_product_name', $keyword);
        }

        if (!empty($brand)) {
            $query->where('master_product.master_product_brand', $brand);
        }

        // if (!empty($search)) {
        //     $query->like('brand_name', $search)
        //           ->orLike('brand_code', $search);
        // }

        return $query->paginate($perPage);
    }
}
