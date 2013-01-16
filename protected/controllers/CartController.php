<?php

class CartController extends Controller {

    public function actionMycart() {
        if (!Yii::app()->user->checkAccess('myCart')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

        if (Yii::app()->request->isPostRequest) {
            if (Yii::app()->request->getPost('clearCart')) {
                Yii::app()->user->isGuest ?
                                Cart::model()->clearCart(-1, session_id()) : Cart::model()->clearCart(Yii::app()->user->id, session_id());
            }
            if ($cartItemIDforDelete = Yii::app()->request->getPost('deleteFromCart')) {
                Yii::app()->user->isGuest ?
                                Cart::model()->deleteFromCart($cartItemIDforDelete['cart_id'], -1, session_id()) :
                                Cart::model()->deleteFromCart($cartItemIDforDelete['cart_id'], Yii::app()->user->id, session_id());
            }
        }
        
        //show cart
        Yii::app()->user->isGuest ? $myCart = Cart::model()->viewMyCart(-1, session_id()) : $myCart = Cart::model()->viewMyCart(Yii::app()->user->id, -1);

        $this->render('mycart', array("myCart" => $myCart));
    }

}