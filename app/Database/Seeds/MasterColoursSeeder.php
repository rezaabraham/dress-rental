<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterColoursSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['colour_name' => 'Red'],
            ['colour_name' => 'Blue'],
            ['colour_name' => 'Green'],
            ['colour_name' => 'Black'],
            ['colour_name' => 'White'],
        ];

        $this->db->table('master_colours')->insertBatch($data);
    }
}
