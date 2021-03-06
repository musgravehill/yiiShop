<?php

$this->pageTitle = $product->name;
$this->breadcrumbs = array(Yii::t('catalog', 'Catalog') => array('/catalog'), $product->name);
$productRating = Comment::model()->getProductRating($product->id);
$imageLink = Yii::app()->createAbsoluteUrl(Yii::app()->params['imagesProductRoot'].'/'.$product->image);
$imageSrcLink = Yii::app()->createAbsoluteUrl(Yii::app()->params['imagesProductRoot'].'/src-'.$product->image);

echo '<script src="' . Yii::app()->theme->baseUrl . '/js/jquery.raty.min.js"></script>
<script type="text/javascript">
    $.fn.raty.defaults.path = "' . Yii::app()->theme->baseUrl . '/images/raty";  
    $.fn.raty.defaults.space =  false;   
    $.fn.raty.defaults.hints  =  ["' . Yii::t('ratingStar', 'bad') . '","' . Yii::t('ratingStar', 'poor') . '","' . Yii::t('ratingStar', 'regular') . '","' . Yii::t('ratingStar', 'good') . '","' . Yii::t('ratingStar', 'gorgeous') . '"];

    $(function() {                            
                $("#averageRating").raty({
                    readOnly : true,                                
                    score    : ' . $productRating['averageRating'] . '
                });
            });       
    </script>

<div itemscope itemtype="http://schema.org/Product">   
    <div class="row">
        <h1 itemprop="name" class="span12">' . $product->name . '</h1>
        
    </div>
    <div class="row">
        <div class="span4">
            <a href="#srcProductImageModal" role="button" data-toggle="modal" title="смотреть исходное фото">
                <img class="thumbnail" itemprop="image" src="' . $imageLink . '" title="' . $product->name . '" alt="' . $product->name . '" />
            </a>            
            
            <div id="srcProductImageModal" class="modal hide fade" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <label>' . $product->name . '</label>                    
                </div>
                <div class="modal-body">
                    <img class="thumbnail" src="' . $imageSrcLink . '" title="обои-' . $product->name . '" alt="обои-' . $product->name . '" />
                </div>            
            </div>
        </div>        
        <div class="span4" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <span itemprop="ratingValue" style="display:none;">' . $productRating['averageRating'] . '</span> 
            <span id="averageRating"></span>
            <span class="muted" itemprop="reviewCount">' . $productRating['countVote'] . '</span> <span class="muted">' . Yii::t('product', 'votes') . '</span>
        </div>
        <span class="muted span1" itemprop="sku">sku:' . $product->id . '</span> <br><br>
        
        <div class="span5 alert alert-success">
            <div class="pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <span style="display: none;" itemprop="priceCurrency">RUB</span>
                <link itemprop="availability" href="http://schema.org/InStock" />
                <span class="price"><span itemprop="price">' . $product->price . '</span> рублей</span>                  
            </div>             ';
            if ($product->stock > 0) {
                $this->renderPartial('//product/_addToCart', array('product_id' => $product->id, 'product_stock' => $product->stock));
            } else {
                echo '<span class="label label-important pull-right">' . Yii::t('product', 'sold out') . '</span>&nbsp;';
            }
echo    '</div>';
if (Yii::app()->user->hasFlash('successAddToCart')) {
    echo '<div class="alert alert-success span5">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>'
    . Yii::app()->user->getFlash('successAddToCart') . '</div>';
}
if (Yii::app()->user->hasFlash('errorAddToCart')) {
    echo '<div class="alert alert-error span5">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>'
    . Yii::app()->user->getFlash('errorAddToCart') . '</div>';
}


echo '      
    </div>
    <div class="row">   
        <div class="span12" itemprop="description">' . $product->description . '</div>
    </div>

';

echo '<h2 class="span12 small">' . Yii::t('product', 'comments') . '</h2>';

$criteria = array('product_id' => (integer) $product->id);
$comments = Comment::model()->getComments($criteria);
$comm_num = 1;
foreach ($comments as $comment) {
    echo '<div class="row" itemprop="review" itemscope itemtype="http://schema.org/Review">';
    echo '  <div class="span5 well">   
        <strong itemprop="author">' . CHtml::encode($comment['author']) . '</strong>::
        <span itemprop="name">' . CHtml::encode($comment['title']) . '</span>  

        <meta itemprop="datePublished" content="' . $comment['datePublished'] . '"><span class="muted">' . $comment['datePublished'] . '</span>
        <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">                    
            <span itemprop="ratingValue" style="display:none;">' . (int) $comment['ratingValue'] . '</span>  
            <div id= "rating_' . $comm_num . '"></div>
        </div>
        <div itemprop="description">' . CHtml::encode($comment['description']) . '</div>
    </div>
</div>

<script type="text/javascript">
    $(function() {                    
        $("#rating_' . $comm_num . '").raty({
            readOnly : true,                        
            score    : ' . (float) $comment['ratingValue'] . '
        });
    });       
</script>        
';
    $comm_num++;
}
echo '</div> <!--end Product-->';

if (Yii::app()->user->checkAccess('addCommentProduct')) {
    echo '<div class="row">';
    $this->renderPartial('//product/_addComment', array('product_id' => $product->id));
    echo '</div>';
}

