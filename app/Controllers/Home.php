<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->getLatest(8);
        $data['title'] = 'NexaStore - Your Ultimate Shopping Destination';
        return view('home/index', $data);
    }

    public function about ()
    {
        $data['title'] = 'About Us - NexaStore';
        return view('home/about', $data);
    }

    public function contact ()
    {
        $data['title'] = 'Contact Us - NexaStore';
        return view('home/contact', $data);
    }

    public function sendContact ()
    {
        // Handle contact form 
        return redirect()->to('/contact')->with('success', 'Your message has been sent!');
    }

    public function products ()
    {
        $productModel = new ProductModel();
        $keyword = $this -> request->getGet('q');
        if ($keyword) {
            $data['products'] = $productModel-> search($keyword);
        } else {
            $data['products'] = $productModel -> findAll();
        }
        $data['title'] = 'Products - NexaStore';
        return view('home/products', $data);

    }

    public function productDetail($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel -> find($id);
        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }
        $data['title'] = $data['product']['name'] . ' - NexaStore';
        return view('home/product_detail', $data);
    }

}
