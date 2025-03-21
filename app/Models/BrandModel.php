<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'master_brands';
    protected $primaryKey = 'brand_id';
    protected $allowedFields = ['brand_name', 'brand_code','brand_isactive'];
    protected $returnType = 'array';

    public function getPaginatedBrands($perPage, $search = null)
    {
        $query = $this->where('brand_isactive', 'y');

        if (!empty($search)) {
            $query->like('brand_name', $search)
                  ->orLike('brand_code', $search);
        }

        return $query->paginate($perPage);
    }
}
