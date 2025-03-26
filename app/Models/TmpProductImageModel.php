<?php

namespace App\Models;

use CodeIgniter\Model;

class TmpProductImageModel extends Model
{
    protected $table      = 'tmp_product_image';
    protected $primaryKey = 'tmp_product_image_id ';
    protected $allowedFields = [
        'tmp_product_image_formid', 
        'tmp_product_image_path', 
        'tmp_product_image_createdby'
    ];
}
