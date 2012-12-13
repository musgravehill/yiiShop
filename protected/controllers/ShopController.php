<?php

class ShopController extends Controller {

    public function actionCatalog() {
        if (!Yii::app()->user->checkAccess('shopCatalog')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

        $products = Product::model()->findAll(
                array(
                    "condition" => " stock = 1 ",
                    "order" => "price", //rand()
                    "limit" => 10,
                )
        );

        $this->render('catalog', array("products" => $products));
    }

    public function actionProduct($productURL) {

        if (!Yii::app()->user->checkAccess('shopProduct')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

             

        $productURL = addslashes($productURL);
        $product = Product::model()->find(
                array(
                    "condition" => " url = '$productURL' ",
                    "limit" => 1,
                )
        );

        $Cart = new Cart;
        if (isset($_POST['addToCart'])) {
            if ($Cart->addTocart($_POST['addToCart'])) {
                Yii::app()->user->setFlash('successAddToCart', 'Товар добавлен в корзину');
            } else {
                Yii::app()->user->setFlash('errorAddToCart', 'Товар не добавлен в корзину');
            }
        }
        $this->render('product', array("product" => $product));
    }

    public function actionMycart() {
        if (!Yii::app()->user->checkAccess('myCart')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }
        
        if ( (isset($_POST['clearCart'])) && (!Yii::app()->user->isGuest) ) {
            Cart::model()->clearCart(Yii::app()->user->id);
        }        
        
        if (Yii::app()->user->isGuest) {            
            $myCart = Cart::model()->viewMyCart(0,session_id());
        } else {            
            $myCart = Cart::model()->viewMyCart(Yii::app()->user->id,0);
        }            

        $this->render('mycart', array("myCart" => $myCart));
    }

}