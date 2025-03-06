<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterBrandSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['brand_name' => 'Atelier Mode', 'brand_code' => 'AM'],
            ['brand_name' => 'Lyra Official', 'brand_code' => 'LO'],
            ['brand_name' => 'Kartinis Label', 'brand_code' => 'KL'],
            ['brand_name' => 'Seliyane', 'brand_code' => 'SL'],
            ['brand_name' => 'Cera Official', 'brand_code' => 'CO'],

        ];

        $this->db->table('master_brands')->insertBatch($data);
    }
}
