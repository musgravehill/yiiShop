<?php

class CatalogController extends Controller {

    public function actionViewCatalog() {
        if (!Yii::app()->user->checkAccess('viewCatalog')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }
        $priceMax = (int) Product::model()->getPriceMax(); //max price in all catalog


        if (isset($_GET['priceRange'])) {
            $priceRange = explode('-', $_GET['priceRange']);
            $priceRangeMin = $priceRange[0]; //goods from price
            $priceRangeMax = $priceRange[1]; //goods to price
        } else {
            $priceRangeMin = 0;
            $priceRangeMax = $priceMax;
        }

        if (isset($_GET['productTag'])) {
            $tag_id = (int) $_GET['productTag'];
        } else {
            $tag_id = false;
        }
        
        $products = Product::getProducts($priceRangeMin, $priceRangeMax, $tag_id);

        $this->render('viewcatalog', array("products" => $products, 'priceMax' => $priceMax,
            'priceRangeMin' => $priceRangeMin, 'priceRangeMax' => $priceRangeMax, 'tag_id'=>$tag_id,
        ));
    }

}