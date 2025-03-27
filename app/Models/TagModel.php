<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table      = 'master_tag';
    protected $primaryKey = 'master_tag_id';
    protected $allowedFields = [
       'master_tag_name'
    ];
}
