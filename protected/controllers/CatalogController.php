<?php

class CatalogController extends Controller {

    public function actionViewCatalog() {
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

        $this->render('viewcatalog', array("products" => $products));
    }   

}