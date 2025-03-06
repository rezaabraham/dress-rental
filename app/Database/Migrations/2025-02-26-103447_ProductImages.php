<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductImages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'image_id'    => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'product_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'image_url'   => ['type' => 'VARCHAR', 'constraint' => 255], // Menyimpan URL atau path gambar
            'created_at'  => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('image_id');

        // Menambahkan Foreign Key ke tabel master_products
        $this->forge->addForeignKey('product_id', 'master_products', 'product_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('product_images');
    }

    public function down()
    {
        $this->forge->dropTable('product_images');
    }
}
