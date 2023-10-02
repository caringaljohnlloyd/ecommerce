<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EcommerceModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new EcommerceModel();
    }

    public function admin()
    {
        return view('adminview');
    }

    public function adminch()
    {
        return view('adminchart');
    }

    public function admintab()
    {
        return view('admintable');
    }

    public function inventory()
    {
        $data = [
            'model' => $this->model->findAll(),
        ];
        return view('admininventory', $data);
    }

    public function add()
    {
        $file = $this->request->getFile('image');
        $product_name = $this->request->getPost('ProductName');
        $product_description = $this->request->getPost('ProductDescription');
        $product_category = $this->request->getPost('ProductCategory');
        $product_quantity = $this->request->getPost('ProductQuantity');
        $product_price = $this->request->getPost('ProductPrice');

        $newName = $product_name . '_' . $product_category . '.' . $file->getClientExtension();
        $file->move(ROOTPATH . 'public/', $newName);

        $data = [
            'image' => $newName,
            'ProductName' => $product_name,
            'ProductDescription' => $product_description,
            'ProductCategory' => $product_category,
            'ProductQuantity' => $product_quantity,
            'ProductPrice' => $product_price,
        ];

        $this->model->insert($data);

        return redirect()->to(base_url('/admininventory/inventory'));
    }

    public function edit($id)
{
    $product = $this->model->find($id);

    if (!$product) {
        return redirect()->to(base_url('/admininventory/inventory'))->with('error', 'Product not found');
    }
    $file = $this->request->getFile('image');
    $product_name = $this->request->getPost('ProductName');
    $product_description = $this->request->getPost('ProductDescription');
    $product_category = $this->request->getPost('ProductCategory');
    $product_quantity = $this->request->getPost('ProductQuantity');
    $product_price = $this->request->getPost('ProductPrice');

    $newName = $product_name . '_' . $product_category . '.' . $file->getClientExtension();
    $file->move(ROOTPATH . 'public/', $newName);

    $data = [
        'image' => $newName,
            'ProductName' => $product_name,
            'ProductDescription' => $product_description,
            'ProductCategory' => $product_category,
            'ProductQuantity' => $product_quantity,
            'ProductPrice' => $product_price,
    ];

    // Update the product with the new data
    $this->model->update($id, $data);

    return redirect()->to(base_url('/admininventory/inventory'))->with('success', 'Product updated successfully');
}


    public function delete($id)
    {
        $this->model->delete(['ID' => $id]);
        $data = [
            'model' => $this->model->findAll(),
        ];
        return redirect()->to(base_url('/admininventory/inventory'));
    }
}
