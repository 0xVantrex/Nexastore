<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $hiddenFields    = ['password'];
    protected $allowedFields    = ['name', 'email', 'password', 'role'];
    protected $useTimestamps = true;

    // Validation
    protected $validationRules      = [
        'name' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
        'role' => 'in_list[admin,editor,user]',
    ];

    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}
