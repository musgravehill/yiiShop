<?php

class ProductController extends Controller {   
    public function filters() {
        return array(
            array(
                'productURLandLangOutputCache +ViewProduct',
                'duration' => 1,     //3600*24*365           
            ),
        );
    } 

    public function actionViewProduct($productURL) {
        if (!Yii::app()->user->checkAccess('shopProduct')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

        if ((isset($_POST['addComment'])) && (Yii::app()->user->checkAccess('addCommentProduct'))) {

            $document = array(
                "user_id" => (integer) Yii::app()->user->id,
                "product_id" => (integer) $_POST['addComment']['product_id'],
                "author" => Yii::app()->user->name,
                "ratingValue" => (float) $_POST['addComment']['ratingValue'],
                "title" => $_POST['addComment']['title'],
                "description" => $_POST['addComment']['description'],
                "datePublished" => date('Y-m-d H:i:s'));
            Comment::model()->addComment($document);
            
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
        if (!($product = Product::model()->find(array("condition" => " url = '$productURL' ",)))) {
            throw new CHttpException(404, 'Товар не найден');
        }

        $this->render('viewproduct', array("product" => $product));
    }

}
