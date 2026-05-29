<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel    = new UserModel();
        $orderModel   = new OrderModel();
        $productModel = new ProductModel();

        $data['title']          = 'Admin Panel - NexaStore';
        $data['total_users']    = $userModel->countAll();
        $data['total_products'] = $productModel->countAll();
        $data['total_orders']   = $orderModel->countAll();
        $data['recent_orders']  = $orderModel->getAllWithUsers();

        return view('admin/index', $data);
    }

    public function users()
    {
        $userModel     = new UserModel();
        $data['title'] = 'Manage Users - NexaStore';
        $data['users'] = $userModel->findAll();
        return view('admin/users', $data);
    }

    public function orders()
    {
        $orderModel     = new OrderModel();
        $data['title']  = 'Manage Orders - NexaStore';
        $data['orders'] = $orderModel->getAllWithUsers();
        return view('admin/orders', $data);
    }

    public function orderDetail($id)
    {
        $orderModel    = new OrderModel();
        $data['title'] = 'Order Detail - NexaStore';
        $data['order'] = $orderModel->find($id);

        if (!$data['order']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order not found');
        }

        return view('admin/order_detail', $data);
    }

    public function updateStatus($id)
    {
        $orderModel = new OrderModel();
        $userModel = new UserModel();
        $status     = $this->request->getPost('status');

        $order = $orderModel->find($id);

        if ($orderModel->update($id, ['status' => $status])) {
            // Send SMS notification to customer
            $user = $userModel->find($order['user_id']);
            if ($user && $user['phone']) {
                $sms = new \App\Libraries\SmsLibrary();
                $sms ->sendOrderStatusUpdate($user['phone'], $user['name'], $id, $status);
            }
            return redirect()->to('/admin/orders')->with('success', 'Order status updated!');
        }

        return redirect()->to('/admin/orders')->with('error', 'Failed to update status.');
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();

        if ($userModel->delete($id)) {
            return redirect()->to('/admin/users')->with('success', 'User deleted successfully!');
        }

        return redirect()->to('/admin/users')->with('error', 'Failed to delete user.');
    }
}