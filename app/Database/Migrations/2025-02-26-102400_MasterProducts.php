<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id'       => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'product_name'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'product_code'     => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'product_colour'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'product_size'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'product_brand'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'product_price'    => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'product_rental_period'=> ['type' => 'INT', 'constraint' => 11],
            'product_desc'     => ['type' => 'TEXT', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('product_id');

        // Menambahkan Foreign Key
        $this->forge->addForeignKey('product_colour', 'master_colours', 'colour_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_size', 'master_sizes', 'size_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_brand', 'master_brands', 'brand_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('master_products');
    }

    public function down()
    {
        $this->forge->dropTable('master_products');
    }
}
