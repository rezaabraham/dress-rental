<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterColours extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'colour_id'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'colour_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addPrimaryKey('colour_id');
        $this->forge->createTable('master_colours');
    }

    public function down()
    {
        $this->forge->dropTable('master_colours');
    }
}
