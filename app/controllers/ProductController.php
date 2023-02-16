<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoriesModel;
use App\Request;

class ProductController extends Controller {
    private $model;
    public function __construct() {
        $this->model = new ProductModel();
    }

    public function listProducts() {
        $title = "Danh sách sản phẩm";
        $products = $this->model->getValue()->where('status', '=', '1')->orderBy('id', 'DESC')->findAll();
        return $this->view('Back-end/products/list-products',
        [
            'products' => $products,
            'title' => $title
        ]);
    }

    public function createProduct() 
    {
        $title = "Thêm sản phẩm";
        $categoryModel = new CategoriesModel(); 
        $categories = $categoryModel->getValue([])->findAll();
        return $this->view('Back-end/products/add-products', 
        [
            'categories' => $categories,
            'title' => $title
        ]);

    }

    public function storeProduct(Request $request) 
    {
        $product = $request->getBody();
        $image = $_FILES['image']['name'];
        $checkImg = ['jpg', 'jpeg', 'png', 'gif'];
        $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $check = in_array($imgFileType, $checkImg);
        move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $image);
        $product['image'] = $image;
        $this->model->insert($product);
        setcookie('message', 'Thêm sản phẩm thành công', time() + 3);
        header("Location: ./list-products");
    }


    public function showUpdateProduct(Request $request)
    {
        $title = "Update Product";
        $product = $request->getBody();
        $product = $this->model->getValue()->where('id', '=', $product['id'])->findOne();

        $categoryModel = new CategoriesModel();
        $categories = $categoryModel->getValue()->findAll();
        return $this->view('Back-end/products/update-products', 
        [
            'product' => $product,
            'categories' => $categories,
            'title' => $title
        ]);
    }

    public function updateProduct(Request $request) 
    {
        $product = $request->getBody();
        $image = $_FILES['image']['name'];
        $checkImg = ['jpg', 'jpeg', 'png', 'gif'];
        $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $check = in_array($imgFileType, $checkImg);
        if($_FILES['image']['size'] > 0 && $check) {
            $product['image'] = $image;
            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $image);
        }
        $result = $this->model->getValue()->where('id', '=', $product['id'])
        ->findOne()->update($product);
        if($result) {
            setcookie('message', 'Cập nhật dữ liệu thành công', time() + 3);
        }else {
            setcookie('message', 'Cập nhật dữ liệu không thành công', time() + 3);
        }
        header("Location: ./list-products");
        exit;
    }

    
    public function deleteProduct(Request $request) 
    {
        // status: 0 xóa, 1 tồn tại
        $product = $request->getBody();
        $product['status'] = 0;
        $result = $this->model->getValue()->where('id', '=', $product['id'])
        ->findOne()->update(['status' => $product['status']]);
        if($result) {
            setcookie('message', 'Xóa thành công :))', time() + 3);
        }else {
            setcookie('message', 'Xóa không thành công :((', time() + 3);
        }
        header("Location:./list-products");
        exit;
    }
}