<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterBrands extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'brand_id'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'brand_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'brand_code' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('brand_id');
        $this->forge->createTable('master_brands');
    }

    public function down()
    {
        $this->forge->dropTable('master_brands');
    }
}
