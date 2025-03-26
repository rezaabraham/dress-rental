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
        'master_product_category',
        'master_product_brand', 
        'master_product_price', 
        'master_product_rent_days', 
        'master_product_desc',
        'master_product_thumbnail',
        'master_product_extra_days_price',
        'master_product_rental_period',
        'master_product_isactive'
    ];

    public function generateProductCode()
    {
        $query = $this->select('LPAD(IFNULL(MAX(master_product_id),0) + 1, 3, "0") AS new_code', false)
                      ->first();
        
        return $query ? $query['new_code'] : '001';
    }
}
