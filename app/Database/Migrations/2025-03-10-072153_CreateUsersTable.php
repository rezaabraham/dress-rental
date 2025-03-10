<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'        => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'user_username'  => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'user_password'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'user_role'      => ['type' => 'ENUM', 'constraint' => ['admin', 'user'], 'default' => 'user'],
            // 'created_at' => [
            //     'type'    => 'TIMESTAMP',
            //     'null'    => false,
            //     'default' => 'CURRENT_TIMESTAMP'
            // ],
        ]);

        $this->forge->addField([
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('master_users');
    }

    public function down()
    {
        $this->forge->dropTable('master_users');
    }
}
