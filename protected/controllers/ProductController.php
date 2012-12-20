<?php

class ProductController extends Controller {

    public function actionViewProduct($productURL) {

        if (!Yii::app()->user->checkAccess('shopProduct')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }
        
        if ( (isset($_POST['addComment'])) && (Yii::app()->user->checkAccess('addCommentProduct')) ) { 
            $Comment = new Comment();
            $document = array( "user_id" => (integer)Yii::app()->user->id, 
                "product_id" => (integer)$_POST['addComment']['product_id'], 
                "comment"=>(string)$_POST['addComment']['comment'] );
            $Comment->addComment($document);             
        }  
        
        if (isset($_POST['addToCart'])) {
            $Cart = new Cart;
            if ($Cart->addTocart($_POST['addToCart'])) {
                Yii::app()->user->setFlash('successAddToCart', 'Товар добавлен в корзину');
            } else {
                Yii::app()->user->setFlash('errorAddToCart', 'Товар не добавлен в корзину');
            }
        }

        $productURL = addslashes($productURL);
        if (!($product = Product::model()->find(array("condition" => " url = '$productURL' ", ) ))) {
            throw new CHttpException(404, 'Товар не найден');
        }      
        
        $this->render('viewproduct', array("product" => $product));
    }

}
