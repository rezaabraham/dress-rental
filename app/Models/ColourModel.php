<?php

namespace App\Models;

use CodeIgniter\Model;

class ColourModel extends Model
{
    protected $table            = 'master_colours';
    protected $primaryKey       = 'colour_id,colour_name';
    protected $allowedFields    = [];


    
}
