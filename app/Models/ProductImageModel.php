<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    protected $table      = 'product_images';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['product_id', 'image_url'];
}
