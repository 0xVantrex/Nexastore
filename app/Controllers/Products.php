<?php

namespace App\Controllers;

use App\Model\ProductModel;

class Products extends BaseController
{
    public function create()
    {
        $data['title'] = 'Add Product - NexaStore';
        return view('products/create', $data);
    
    }

    public function store()
    {
        $model = new ProductModel();

        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'description'=> $this->request->getPost('description'),
            'price'      => $this->request->getPost('price'),
            'stock'      => $this->request->getPost('stock'),   
            'image'      => $imageName,
            'created_by' => session()->get('user_id'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/products')->with('success', 'product added successfully!' );
        }

            return redirect()->to('/products/create')->with('error', 'Failed to add product.');
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model -> find($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }

        $data['title'] = 'Edit Product - NexaStore';
        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found.');
        }

        $image = $this->request->getFile('image');
        $imageName = $product['image'];

        if ($image && image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'stock'     =>$this->request->getPost('stock'),
            'price'     =>$this->request->getPost('price'),
            'image'     => $imageName,
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/products/edit/' . $id)->with('error', 'Failed to update product.');
        }
    }

        public function delete($id)
        {
            $model = new ProductModel();

            if  ($model->delete($id)) {
                return redirect()->to('/products')->with('success', 'product deleted succesfully!');
            }

            return redirect()->to('/products') -> with('error', 'Failed to delete product.');


        }

    }

        

