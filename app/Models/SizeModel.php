<?php

namespace App\Models;

use CodeIgniter\Model;

class SizeModel extends Model
{
    protected $table      = 'master_sizes';
    protected $primaryKey = 'size_id';
    protected $allowedFields = [
       'size_name'
    ];
}