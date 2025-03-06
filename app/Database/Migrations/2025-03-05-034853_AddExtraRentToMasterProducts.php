<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExtraRentToMasterProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('master_products', [
            'product_extra_days_price' => [
                'type'       => 'Decimal',
                'constraint' => '10,2',
                'null'       => true,
                'after'      => 'product_price'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('master_products', 'product_extra_days_price');
    }
}
