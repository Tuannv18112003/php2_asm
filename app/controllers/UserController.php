<?php
namespace App\Controllers;

use App\Request;
use App\Models\UserModel;

class UserController extends Controller {
    public function login() {
        $title = 'Login';

        return $this->view('Back-end/login', ['title' => $title]);
    }

    public function loginUser(Request $request) {
        $infoUser = $request->getBody();
        $userModel = new UserModel();
        $user = $userModel->getValue()->where('email', '=' ,$infoUser['email'])
        ->andWhere('password', '=' ,$infoUser['password'])->findOne();
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
        return $this->view("Back-end/users/add-users", []);
    }

    public function storeUsers(Request $request) {
        $userModel = new UserModel();
        $data = $request->getBody();
        $userModel->insert($data);
        header("Location: ./list-users");
    }

}
