<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_name'     => 'Olga Dress',
                'product_code'     => 'OD001',
                'product_colour'   => 1, // Sesuaikan dengan ID dari tabel master_colours
                'product_size'     => 3, // Sesuaikan dengan ID dari tabel master_sizes
                'product_brand'    => 2, // Sesuaikan dengan ID dari tabel master_brands
                'product_price'    => 150000,
                'product_rental_period'=> 3,
                'product_desc'     => 'Gaun merah elegan untuk acara spesial.',
            ],
            [
                'product_name'     => 'Anaia Floral',
                'product_code'     => 'OD002',
                'product_colour'   => 4, // Black
                'product_size'     => 4, // L
                'product_brand'    => 1, // Gucci
                'product_price'    => 180000,
                'product_rental_period'=> 5,
                'product_desc'     => 'Dress hitam klasik yang selalu trendi.',
            ],
            [
                'product_name'     => 'White Gown Dress',
                'product_code'     => 'SL001',
                'product_colour'   => 4, // Black
                'product_size'     => 4, // L
                'product_brand'    => 1, // Gucci
                'product_price'    => 180000,
                'product_rental_period'=> 5,
                'product_desc'     => 'Dress hitam klasik yang selalu trendi.',
            ],
            [
                'product_name'     => 'Kebaya Velvet Hitam',
                'product_code'     => 'SL002',
                'product_colour'   => 4, // Black
                'product_size'     => 4, // L
                'product_brand'    => 1, // Gucci
                'product_price'    => 180000,
                'product_rental_period'=> 5,
                'product_desc'     => 'Dress hitam klasik yang selalu trendi.',
            ],
            [
                'product_name'     => 'Inara',
                'product_code'     => 'SL003',
                'product_colour'   => 4, // Black
                'product_size'     => 4, // L
                'product_brand'    => 1, // Gucci
                'product_price'    => 180000,
                'product_rental_period'=> 5,
                'product_desc'     => 'Dress hitam klasik yang selalu trendi.',
            ],
            [
                'product_name'     => 'Maudy set',
                'product_code'     => 'SL004',
                'product_colour'   => 4, // Black
                'product_size'     => 4, // L
                'product_brand'    => 1, // Gucci
                'product_price'    => 180000,
                'product_rental_period'=> 5,
                'product_desc'     => 'Dress hitam klasik yang selalu trendi.',
            ],
        ];

        $this->db->table('master_products')->insertBatch($data);
    }
}
