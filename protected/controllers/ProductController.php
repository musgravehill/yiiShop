<?php

class ProductController extends Controller {

    public function filters() {
        return array(
            array(
                'COutputCache +ViewProduct',
                'duration' => 4, //3600 * 24 * 365
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

        $haveToClearCache = false;

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
                $haveToClearCache = true;
            }

            if ($postAddToCart = Yii::app()->request->getPost('addToCart')) {
                $Cart = new Cart;
                if ($Cart->addTocart($postAddToCart)) {  //product update stock=> lastModified update=>clear cache in this
                    Yii::app()->user->setFlash('successAddToCart', Yii::t('product', 'Succesfully add to cart!'));
                } else {
                    Yii::app()->user->setFlash('errorAddToCart', Yii::t('product', 'Can`t add to cart. Probably item no longer exists or you have specified more than in stock. Set count less than in stock.'));
                }
            }
        }

        $productURL = addslashes($productURL);
        if (!($product = Product::model()->find(array("condition" => " url = '$productURL' ",)))) {
            throw new CHttpException(404, 'Товар не найден');
        }
        
        if ($haveToClearCache) {
            $product->save(); //product update => lastModified update=>clear cache in this
        } 


        $this->render('viewproduct', array("product" => $product));
    }

}
