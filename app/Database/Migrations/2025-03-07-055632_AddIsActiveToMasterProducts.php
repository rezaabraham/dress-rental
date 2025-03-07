<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsActiveToMasterProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('master_products', [
            'product_isactive' => [
                'type'       => 'Char',
                'constraint' => '1',
                'null'       => false,
                'default'   => 'y',
                'after'      => 'product_thumbnail'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('master_products', 'product_isactive');
    }
}
