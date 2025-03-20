<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsActiveToBrands extends Migration
{
    public function up()
    {
        $this->forge->addColumn('master_brands', [
            'brand_isactive' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'default'    => 'y',
                'after'      => 'brand_code'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('master_brands', 'brand_isactive');
    }
}
