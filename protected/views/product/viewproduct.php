<?php

$this->pageTitle = $product->name;
$this->breadcrumbs = array('Каталог' => array('/catalog'), $product->name);
echo '<div class="row">';
echo '
        <div class="span5">
            <h1>' . $product->name . '</a></h1>
            <h3>' . $product->price . ' рублей</h3>               
            <img src="/images/product/' . $product->id . '.jpg" title="" alt="" />
            <p>' . $product->description . '</p>    
        </div>
       ';

$this->renderPartial('//product/_addToCart', array('product_id' => $product->id));
echo '</div>';

if (Yii::app()->user->checkAccess('addCommentProduct')) {
    echo '<div class="row"> <h2>t::comments</h2>';
    $this->renderPartial('//product/_addComment', array('product_id' => $product->id));
    echo '</div>';
}

$Comment = new Comment();
$criteria = array('product_id' => (integer) $product->id);
$comments = $Comment->getComments($criteria);
foreach ($comments as $comment) {
    echo '<div class="row">';
    echo '<div class="span5 well">        
            <h3>user_id=' . $comment['user_id'] . '</h3>' .
    '<div>' . CHtml::encode($comment['comment']) . '</div>
        </div>';
    echo '</div>';
}





if (Yii::app()->user->hasFlash('successAddToCart')) {
    echo '<div class="alert alert-success span2">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'
    . Yii::app()->user->getFlash('successAddToCart') . '</div>';
}
if (Yii::app()->user->hasFlash('errorAddToCart')) {
    echo '<div class="alert alert-error span3">
               <button type="button" class="close" data-dismiss="alert">&times;</button>'
    . Yii::app()->user->getFlash('errorAddToCart') . '</div>';
}
?>