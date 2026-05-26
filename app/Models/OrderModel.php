<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'total', 'status'];
    protected $useTimestamps = true;


    // Validation
    protected $validationRules      = [
        'user_id' => 'required|integer',
        'total' => 'required|decimal|greater_than[0]',
        'status' => 'required|in_list[pending,processing,shipped,delivered,cancelled]',
    ];

    public function getOrdersByUser(int $userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getAllWithUsers()
    {
        return $this->db->table('orders o')
                        ->select('o.*, u.name as user_name, u.email as user_email')
                        ->join('users u', 'u.id = o.user_id')
                        ->orderBy('o.created_at', 'DESC')
                        ->get()
                        ->getResultArray();
    }
}
