<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table            = 'master_attire_type';
    protected $primaryKey       = 'master_attire_type_id';
    protected $allowedFields    = ['master_attire_type_name'];
}
