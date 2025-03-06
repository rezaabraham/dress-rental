<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'master_brands';
    protected $primaryKey = 'brand_id';
    protected $allowedFields = ['brand_name', 'brand_code'];
}
