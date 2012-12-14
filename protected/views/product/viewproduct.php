<?php

$this->pageTitle = $product->name;
$this->breadcrumbs = array('Каталог' => array('/catalog'), $product->name);
echo '
        <div class="span5">
            <h1>' . $product->name . '</a></h1>
            <h3>' . $product->price . ' рублей</h3>               
            <img src="/images/product/' . $product->id . '.jpg" title="" alt="" />
            <p>' . $product->description . '</p>    
        </div>
       ';

$this->renderPartial('//product/_addToCart', array('product_id' => $product->id));

if (Yii::app()->user->hasFlash('successAddToCart')) {
    echo '<div class="alert alert-success span2">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'
    .Yii::app()->user->getFlash('successAddToCart').'</div>';
}
if (Yii::app()->user->hasFlash('errorAddToCart')) {
    echo '<div class="alert alert-error span3">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'
    .Yii::app()->user->getFlash('errorAddToCart').'</div>';
}
?>