<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'master_users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_username', 'user_password', 'user_role'];
}
