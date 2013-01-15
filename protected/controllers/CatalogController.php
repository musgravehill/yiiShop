<?php

class CatalogController extends Controller {

    public function actionViewCatalog() {
        if (!Yii::app()->user->checkAccess('shopCatalog')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }    
        $priceMax = (int)Product::model()->getPriceMax(); //max price in all catalog
        $priceRangeMin = 0; //goods from price
        $priceRangeMax = $priceMax; //goods to price

        if (Yii::app()->request->isPostRequest) {
            if ($postFilter = Yii::app()->request->getPost('filter')) {
                $priceRangeMin = (int) $postFilter['priceRangeMin'];
                $priceRangeMax = (int) $postFilter['priceRangeMax'];
            }
        }

        $products = Product::model()->findAll(
                array(
                    "condition" => " stock > 0 AND price >= $priceRangeMin AND price <= $priceRangeMax ",
                    "order" => "price", //rand()
                    "limit" => 10,
                )
        );       

        $this->render('viewcatalog', array("products" => $products, 'priceMax'=>$priceMax, 
            'priceRangeMin'=>$priceRangeMin,'priceRangeMax'=>$priceRangeMax
            
            ));
    }

}