<?php
namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Request;

class HomeController extends Controller {
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index(Request $request) {
        $title = 'Trang chủ';
        $productsNew = $this->model->getValue()->where('status', '=', '1')
        ->randOrderBy()->liMit('4')->findAll();
        $productsTrend = $this->model->getValue()->where('status', '=', '1')
        ->randOrderBy()->liMit('8')->findAll();
        $cateModel = new CategoriesModel();
        $categories = $cateModel->getValue()->where('status', '=', '1')->findAll();
        return $this->view('Front-end/index', 
        [
            'productsNew' => $productsNew,
            'productsTrend' => $productsTrend,
            'categories' => $categories,
            'title' => $title
        ]);

    }

    public function shop(Request $request) {
        $cateModel = new CategoriesModel();
        $categories = $cateModel->getValue()->where('status', '=', '1')->findAll();
        $q = $request->getBody();
        if(!empty($q)) {
            $title = "Danh sách sản phẩm";
            $productShop = $this->model->getValue()->where('status', '=', '1')
            ->andWhere('cate_id', '=', $q['id'])->findAll();
            return $this->view('Front-end/shop',
            [
                'productShop' => $productShop,
                'categories' => $categories,
                'title' => $title
            ]);
        }
        return $this->view('Front-end/shop', []);
    }

    public function productDetails(Request $request) {
        $cateModel = new CategoriesModel();
        // $categories = $cateModel->getValue()->where('status', '=', '1')->findAll();
        $q = $request->getBody();
        if(!empty($q)) {
            $title = "Danh sách sản phẩm";
            $productDetail = $this->model->getValue()->where('status', '=', '1')
            ->andWhere('id', '=', $q['id'])->findOne();

            $category = $this->model->getValueJoin(['categories.id', 'categories.name'])
            ->joinTable(['table1' => ['products', 'cate_id'], 'table2' => ['categories', 'id']])
            ->where('products.status', '=', '1')
            ->andWhere('products.id', '=', $q['id'])
            ->findOne();

            $relatedProducts = $this->model->getValueJoin(['products.id as proID', 'product_name', 'products.image', 'price', 'sale' , 'categories.id', 'categories.name'])
            ->joinTable(['table1' => ['products', 'cate_id'], 'table2' => ['categories', 'id']])
            ->where('products.status', '=', '1')
            ->andWhere('products.cate_id', '=', $category->id)
            ->andWhere('products.id', '!=', $productDetail->id)
            ->findAll();

            
            return $this->view('Front-end/product-details',
            [
                'productDetail' => $productDetail,
                'relatedProducts' => $relatedProducts,
                'category' => $category,
                'title' => $title
            ]);
        }
        return $this->view('Front-end/product-details', []);
    }


    public function search(Request $request) {
        $q = $request->getBody();
        $title = "Tìm kiếm: " . $q['q'];
        $cateModel = new CategoriesModel();
        $categories = $cateModel->getValue()->where('status', '=', '1')->findAll();
        $productShop = $this->model->getValue()->where('status', '=', '1')
        ->andWhere('product_name', 'LIKE', "%".$q['q']."%")->findAll();
        return $this->view('Front-end/shop', [
            'productShop' => $productShop,
            'categories' => $categories,
            'title' => $title
        ]);
    }
}