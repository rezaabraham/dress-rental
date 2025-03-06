<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProductThumbnailToMasterProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('master_products', [
            'product_thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'product_desc'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('master_products', 'product_thumbnail');
    }
}
