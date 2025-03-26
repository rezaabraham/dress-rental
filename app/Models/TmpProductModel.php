<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpProductModel extends Model
{
    protected $table      = 'tmp_product';
    protected $primaryKey = 'tmp_product_id ';
    protected $allowedFields = [
        'tmp_product_form_id',
        'tmp_product_code', 
        'tmp_product_name', 
        'tmp_product_colour', 
        'tmp_product_size',
        'tmp_product_brand', 
        'tmp_product_tag',
        'tmp_product_desc',
        'tmp_product_price', 
        'tmp_product_extra_price', 
        'tmp_product_rental_period',
        'tmp_product_created_by',
        'tmp_product_created_at'
    ];
}
