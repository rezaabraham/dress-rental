<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('admin123', PASSWORD_DEFAULT);

        $data = [
            'user_username' => 'admin',
            'user_password' => $password,
            'user_role'     => 'admin'
        ];

        $this->db->table('master_users')->insert($data);
    }
}
