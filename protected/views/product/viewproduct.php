<?php
$Comment = new Comment();
$this->pageTitle = $product->name;
$this->breadcrumbs = array('Каталог' => array('/catalog'), $product->name);
$productRating = $Comment->getProductRating($product->id);

echo '<div itemscope itemtype="http://schema.org/Product">
            <div class="row">
                <div class="span5">
                    <h1 itemprop="name">' . $product->name . '</a></h1>

                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span style="display: none;" itemprop="priceCurrency">RUB</span>
                        <link itemprop="availability" href="http://schema.org/InStock" />
                        <h3><span itemprop="price">' . $product->price . '</span> рублей</h3>        
                    </div>                            
                    <img itemprop="image" src="'.Yii::app()->createAbsoluteUrl('/images/product/' . $product->id.'.jpg'). '" title="' . $product->name . '" alt="' . $product->name . '" />
                    <p itemprop="description">' . $product->description . '</p> 
                    <span itemprop="sku">sku:'.$product->id.'</span>    
                </div>

                <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    Рейтинг <span itemprop="ratingValue">'.$productRating['averageRating'].'</span> из 5
                    по <span itemprop="reviewCount">'.$productRating['countVote'].'</span> голосам
                </div>
       ';

$this->renderPartial('//product/_addToCart', array('product_id' => $product->id));
echo '     </div>';

if (Yii::app()->user->checkAccess('addCommentProduct')) {
    echo '<div class="row"> <h2>t::comments</h2>';
    $this->renderPartial('//product/_addComment', array('product_id' => $product->id));
    echo '</div>';
}


$criteria = array('product_id' => (integer) $product->id);
$comments = $Comment->getComments($criteria);
foreach ($comments as $comment) {
    echo '<div class="row" itemprop="review" itemscope itemtype="http://schema.org/Review">';
    echo '  <div class="span5 well">                 
                    <span itemprop="name">' . CHtml::encode($comment['title']) . '</span> - 
                    by <h4 itemprop="author">' . CHtml::encode($comment['author']) . '</h4>,
                    <meta itemprop="datePublished" content="' . $comment['datePublished'] . '">' . $comment['datePublished'] . '
                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">                    
                    <span itemprop="ratingValue">' . (int)$comment['ratingValue'] . '</span>                    
                </div>
                <div itemprop="description">' . CHtml::encode($comment['description']) . '</div>
            </div>
        </div>
        
    </div> <!--end Product-->';    
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