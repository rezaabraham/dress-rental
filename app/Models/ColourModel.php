<?php

namespace App\Models;

use CodeIgniter\Model;

class ColourModel extends Model
{
    protected $table            = 'master_colours';
    protected $primaryKey       = 'colour_id';
    protected $allowedFields    = ['colour_name'];

    public function getByName($nama)
    {
        return $this->where('colour_name', $nama)->first();
    }

    public function insertIfNotExists($nama)
    {
        if (!$this->getByName($nama)) {
            $this->insert(['colour_name' => $nama]);
        }
    }


    
}
