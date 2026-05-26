<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'description', 'price', 'stock', 'image', 'created_by'];
    protected $useTimestamps = true;

    // Validation
    protected $validationRules      = [
        'name' => 'required|min_length[3]|max_length[200]',
        'price' => 'required|decimal|greater_than[0]',
        'stock' => 'required|integer|greater_than_equal_to[0]',
        'created_by' => 'required|integer',
    ];

    public function getLatest(int $limit = 8)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);

    }

    public function search(string $keyword)
    {
        return $this->like('name', $keyword)
                    ->orLike('description', $keyword)
                    ->findAll();
    }

}
