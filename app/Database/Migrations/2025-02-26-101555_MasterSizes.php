<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterSizes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'size_id'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'size_name' => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('size_id');
        $this->forge->createTable('master_sizes');
    }

    public function down()
    {
        $this->forge->dropTable('master_sizes');
    }
}
