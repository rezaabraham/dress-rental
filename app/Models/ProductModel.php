<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'master_products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = [
        'product_name', 'product_code', 'product_colour', 'product_size',
        'product_brand', 'product_price', 'product_rent_days', 'product_desc','product_thumbnail',
        'product_extra_days_price','product_rental_period'
    ];
}
