<?php
namespace App\Controllers;

use App\Request;
use App\Models\UserModel;


class UserController extends Controller {
    private $model;
    public function __construct() {
        $this->model = new UserModel();
    }
    public function login() {
        $title = 'Login';

        return $this->view('Back-end/login', ['title' => $title]);
    }

    public function loginUser(Request $request) {
        $infoUser = $request->getBody();
        $userModel = new UserModel();
        $user = $userModel->getValue()->where('email', '=' ,$infoUser['email'])
        ->andWhere('password', '=' ,$infoUser['password'])
        ->andWhere('status', '!=', '0')->findOne();
        if(!empty($user)) {
            session_start();
            $_SESSION['id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['role'] = $user->role;
        
            setcookie('message', "Đăng nhập thành công", time() + 3);
            header("location: ./");
            die();
        }
        setcookie('message', "Sai tài khoản hoặc mật khẩu", time() + 3 );
        header("location: ./login");

    }

    public function register() {
        $title = 'Register';
        return $this->view('Back-end/register', ['title' => $title]);
    }
    
    public function createUser(Request $request) {
        $infoUser = $request->getBody();
        $userModel = new UserModel();
        // var_dump($infoUser);
        $errorinfo = [];
        if($infoUser['password'] !== $infoUser['rePassword']) {
            $errorinfo['password'] = "Vui lòng nhập lại chính xác mật khẩu";
            return $this->view('Back-end/register', ['errorinfo' => $errorinfo]);
        }
        $infoUser = [
            'username' => $infoUser['username'],
            'email' => $infoUser['email'], 
            'password' => $infoUser['password']
            ];
        $userModel->insert($infoUser);
        setcookie('message', 'Tạo tài khoản thành công', time() + 3);
        header("Location: ./");
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("location: ./");
    }


    public function createUsers() {
        $title = "Thêm thành viên";
        return $this->view("Back-end/users/add-users", 
        [
            'title' => $title
        ]);
    }

    public function storeUsers(Request $request) {
        $userModel = new UserModel();
        $data = $request->getBody();
        $userModel->insert($data);
        setcookie('message', 'Thêm dữ liệu thành công', time() + 3);
        header("Location: ./list-users");
    }

    public function listUsers() {
        $title = "Danh sách danh mục";
        $userModel = new UserModel();
        $listUsers = $userModel->getValue()->where('status', '=', '1')->findAll();
        return $this->view('Back-end/users/list-users', 
        [
            'listUsers' => $listUsers, 
            'title' => $title
        ]);
    }

    public function showUpdateUsers(Request $request)
    {
        $title = "Sửa thành viên";
        $c = $request->getBody();
        $users = $this->model->getValue()->where('id', '=', $c['id'])->findOne();
        
        return $this->view('Back-end/users/update-users', 
        [
            'users' => $users,
            'title' => $title
        ]);
    }

    public function updateUsers(Request $request) 
    {
        $users = $request->getBody();
        var_dump($users);
        $result = $this->model->getValue()->where('id', '=', $users['id'])
        ->findOne()->update($users);
        if($result) {
            setcookie('message', 'Cập nhật dữ liệu thành công', time() + 3);
        }else {
            setcookie('message', 'Cập nhật dữ liệu không thành công', time() + 3);
        }
        header("Location: ./list-users");
        exit;
    }

    
    public function deleteUsers(Request $request) 
    {
        $c = $request->getBody();
        $c['status'] = 0;
        $result = $this->model->getValue()->where('id', '=', $c['id'])
        ->findOne()->update(['status' => $c['status']]);
        if($result) {
            setcookie('message', 'Xóa thành công :))', time() + 3);
        }else {
            setcookie('message', 'Xóa không thành công :((', time() + 3);
        }
        header("Location:./list-users");
        exit;
    }


}
