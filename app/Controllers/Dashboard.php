<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\MOdels\ProductModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();
        $productModel = new productModel();

        $userId = session()->get('user_id');
        $role =   session()->get('role');

        $data['title'] = 'Dashboard - NexaStore';

        if ($role === 'admin') {
           $data['total_users'] = db_connect()->table('users')->countAll();
           $data['total_products'] = $productModel->countAll();
           $data['total_orders'] = $orderModel -> countAll();
           $data['recent_orders'] = $orderModel -> getAllWithUsers();
        } elseif ($role === 'editor') {
            $data['total_products'] = $productModel->countAll();
            $data['my_products'] = $productModel->where('created_by', $userId) ->findAll();

        } else {
            $data['my_orders'] = $orderModel->getOrderByUser($userId);
        }

        return view('dashboard/index', $data);

    }

    public function profile()
    {
        $data['title'] = 'My Profile - NexaStore';
        return view('dashboard/profile', $data);
    }

    public function myOrders()
    {
        $orderModel = new OrderModel();
        $data['title'] = 'My Orders - NexaStore';
        $data['orders'] = $orderModel->getOrderByuser(session()->get('user_id'));
        return view('dashboard/my_orders', $data);
    }
}
