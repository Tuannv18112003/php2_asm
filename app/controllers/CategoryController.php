<?php
namespace App\Controllers;
use App\Request;
use App\Models\CategoriesModel;

class CategoryController extends Controller {
    private $model;
    public function __construct()
    {
        $this->model = new CategoriesModel();
    }

    public function listCategories() {
        $title = "Danh sách danh mục";
        $categories = $this->model->getValue()->where('status', '=', '1')->findAll();
        return $this->view('Back-end/categories/list-categories', 
        [
            'categories' => $categories, 
            'title' => $title
        ]);
    }

    public function createCategories() 
    {
        $title = "Thêm danh mục";
        return $this->view('Back-end/categories/add-categories', 
        [
            'title' => $title
        ]);
    }

    public function storeCategories(Request $request) 
    {
        $category = $request->getBody();
        $this->model->insert($category);
        header("Location: ./list-categories");
    }

    public function showUpdateCategories(Request $request)
    {
        $title = "Sủa danh mục";
        $c = $request->getBody();
        $categories = $this->model->getValue()->where('id', '=', $c['id'])->findOne();
        
        return $this->view('Back-end/categories/update-categories', 
        [
            'categories' => $categories,
            'title' => $title
        ]);
    }

    public function updateCategories(Request $request) 
    {
        $categories = $request->getBody();
        $result = $this->model->getValue()->where('id', '=', $categories['id'])
        ->findOne()->update($categories);
        if($result) {
            setcookie('message', 'Cập nhật dữ liệu thành công', time() + 3);
        }else {
            setcookie('message', 'Cập nhật dữ liệu không thành công', time() + 3);
        }
        header("Location: ./list-categories");
        exit;
    }

    
    public function deleteCategories(Request $request) 
    {
        $c = $request->getBody();
        $c['status'] = 0;
        $result = $this->model->getValue()->where('id', '=', $c['id'])
        ->findOne()->update(['status' => $c['status']]);
        if($result) {
            setcookie('message', 'Xóa không thành công :((', time() + 3);
        }else {
            setcookie('message', 'Xóa thành công :))', time() + 3);
        }
        header("Location:./list-categories");
        exit;
    }
}