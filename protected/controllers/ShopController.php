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

        $this->render('catalog',array("products"=>$products));
    }
    
    public function actionProduct($productURL){     
        
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
        
        $this->render('product', array("product"=>$product));
    }

}