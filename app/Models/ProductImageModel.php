<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    /* protected $table      = 'product_images';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['product_id', 'image_url']; */

    protected $table      = 'master_product_image';
    protected $primaryKey = 'master_product_image_id';
    protected $allowedFields = ['master_product_image_name','master_product_image_productid','master_product_image_createdby'];
    
}
