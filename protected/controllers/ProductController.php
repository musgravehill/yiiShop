<?php

class ProductController extends Controller {    

    public function actionViewProduct($productURL) {

        if (!Yii::app()->user->checkAccess('shopProduct')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

        $productURL = addslashes($productURL);
        $product = Product::model()->find(
                array(
                    "condition" => " url = '$productURL' ",                  
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
        $this->render('viewproduct', array("product" => $product));
    }   

}
