<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'order_date' => [
                'type'    => 'DATE',
                'null'    => false,
                'default' => date('Y-m-d') // Mengatur default ke tanggal saat ini
            ],
            'order_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true
            ],
            'order_product_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'order_product_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'order_product_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'order_takendate' => [
                'type' => 'DATE',
                'null' => true
            ],
            'order_startdate' => [
                'type' => 'DATE',
                'null' => true
            ],
            'order_enddate' => [
                'type' => 'DATE',
                'null' => true
            ],
            'order_returndate' => [
                'type' => 'DATE',
                'null' => true
            ],
            'order_isreturn' => [
                'type'       => 'CHAR',
                'constraint' => 1,
                'default'    => 'n'
            ],
            // 'order_createddate' => [
            //     'type'    => 'TIMESTAMP',
            //     'null'    => false,
            //     'default' => 'CURRENT_TIMESTAMP'
            // ]
            
        ]);

        $this->forge->addField([
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addPrimaryKey('order_id');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
