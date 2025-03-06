<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSizesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['size_name' => 'XS'],
            ['size_name' => 'S'],
            ['size_name' => 'M'],
            ['size_name' => 'L'],
            ['size_name' => 'XL'],
            ['size_name' => 'XXL'],
        ];

        $this->db->table('master_sizes')->insertBatch($data);
    }
}
