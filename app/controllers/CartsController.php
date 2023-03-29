<?php 
namespace App\Controllers;
use App\Request;
use App\Models\CartsModel;
class CartsController extends Controller {
    private $model;

    public function __construct()
    {
        $this->model = new CartsModel();

    }

    public function viewCarts() {
        $title = "Giỏ hàng";
        if(!isset($_SESSION["carts"])) {
            $_SESSION["carts"] = array();
        }
        var_dump($_SESSION["carts"]);
        return $this->view('Front-end/shop-cart', 
        [
            'carts' => $_SESSION['carts']
        ]);
    }

    public function addToCart(Request $request) {
        // session_start();
        if(!isset($_SESSION['carts'])) {
            $_SESSION['carts'] = [];
        }

        $product = $request->getBody();
        $product['quantity'] = 1;


        for($i = 0; $i < count($_SESSION['carts']); $i++) {
            if($_SESSION['carts'][$i] == $product) {
            }   
        }
        $product['total'] = $product['price'] * $product['quantity']; 

        array_push($_SESSION['carts'], $product);
        header('Location: ./');
    }

    public function removeCart(Request $request) {
        $id = $request->getBody()['id'];

        if(isset($_SESSION['carts'])) {
            unset($_SESSION['carts'][$id]);
            // return $this->view('Front-end/shop-cart',
            // [
            //     'carts' => $_SESSION['carts']
            // ]);
            header("Location: ./shop-carts");    
        }   
    }
}