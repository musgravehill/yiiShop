<?php

class ProductController extends Controller {

    public function filters() {
        return array(
            array(
                'COutputCache +ViewProduct',
                'duration' => 3600 * 24 * 365,
                'varyByExpression' => "(string)Yii::app()->user->isGuest.Yii::app()->language.Yii::app()->controller->actionParams['productURL']",
                'requestTypes' => array('GET'), //on get show cache, on POST run action
                'dependency' => array(
                    'class' => 'system.caching.dependencies.CDbCacheDependency',
                    'sql' => "SELECT lastModified FROM {{product}} WHERE url = '" . Yii::app()->controller->actionParams['productURL'] . "' ")
            ),
        );
    }

    public function actionViewProduct($productURL) {
        if (!Yii::app()->user->checkAccess('shopProduct')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }
        
        $productURL = addslashes($productURL);
        if (!($product = Product::model()->find(array("condition" => " url = '$productURL' ",)))) {
            throw new CHttpException(404, 'Товар не найден');
        }
        
        if (Yii::app()->request->isPostRequest) {

            if (($postComment = Yii::app()->request->getPost('addComment')) && (Yii::app()->user->checkAccess('addCommentProduct'))) {
                $document = array(
                    "user_id" => (integer) Yii::app()->user->id,
                    "product_id" => (integer) $postComment['product_id'],
                    "author" => Yii::app()->user->name,
                    "ratingValue" => (float) $postComment['ratingValue'],
                    "title" => $postComment['title'],
                    "description" => $postComment['description'],
                    "datePublished" => date('Y-m-d H:i:s'));
                Comment::model()->addComment($document);
                $product->save(); //clear cache
            }

            if ($postAddToCart = Yii::app()->request->getPost('addToCart')) {
                $Cart = new Cart;
                if ($Cart->addTocart($postAddToCart)) {
                    Yii::app()->user->setFlash('successAddToCart', 'Товар добавлен в корзину');
                } else {
                    Yii::app()->user->setFlash('errorAddToCart', 'Товар не добавлен в корзину');
                }
                $product->save(); //clear cache
            }
        }       

        

        $this->render('viewproduct', array("product" => $product));
    }

}
