<?php


class CartController
{

    
    public function actionAdd($id)
    {
        Cart::addProduct($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }
    
   
    public function actionDelete($id)
    {  
        Cart::deleteProduct($id);
        header("Location: /cart");
    }

    
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    
    public function actionCheckout()
    { 
        $productsInCart = Cart::getProducts();
        if ($productsInCart == false) {
            header("Location: /");
        }
        $categories = Category::getCategoriesList();
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        $totalQuantity = Cart::countItems();
        $userName = false;
        $userPhone = false;
        $userComment = false;
        $result = false;
        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
        }
        if (isset($_POST['submit'])) {   
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!Order::validate_nuber_phone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if (md5($_POST['norobot']) != $_SESSION['randomnr2']) {
                $errors[] = 'Неправильная капча';
            }
            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
                if ($result) {       
                    Cart::clear();
                }
            }
        }

      
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
