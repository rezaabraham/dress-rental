<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['product_id' => 1, 'image_url' => 'images/elegant_red_gown_1.jpg'],
            ['product_id' => 1, 'image_url' => 'images/elegant_red_gown_2.jpg'],
            ['product_id' => 2, 'image_url' => 'images/classic_black_dress_1.jpg'],
            ['product_id' => 2, 'image_url' => 'images/classic_black_dress_2.jpg'],
        ];

        $this->db->table('product_images')->insertBatch($data);
    }
}
