<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTmpproducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_form' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_colour' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_size' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_brand' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_tag' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_desc' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'product_extra_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'product_days_for_rent' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tmp_products');

    }

    public function down()
    {
        $this->forge->dropTable('tmp_products');
    }
}
