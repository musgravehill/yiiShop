<?php
echo '<script src="'.Yii::app()->theme->baseUrl.'/js/jquery.raty.min.js"></script>
<script type="text/javascript">
    $.fn.raty.defaults.path = "'.Yii::app()->theme->baseUrl.'/images/raty";  
    $.fn.raty.defaults.space =  false;   
    $.fn.raty.defaults.hints  =  ["'.Yii::t('ratingStar','bad').'","'.Yii::t('ratingStar','poor').'","'.Yii::t('ratingStar','regular').'","'.Yii::t('ratingStar','good').'","'.Yii::t('ratingStar','gorgeous').'"];
</script>
';

$Comment = new Comment();
$this->pageTitle = $product->name;
$this->breadcrumbs = array('Каталог' => array('/catalog'), $product->name);
$productRating = $Comment->getProductRating($product->id);

echo '<div itemscope itemtype="http://schema.org/Product">
            <div class="row">
                <div class="span5">
                    <h1 itemprop="name">' . $product->name . '</a></h1>
                        
                    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                        <span itemprop="ratingValue" style="display:none;">'.$productRating['averageRating'].'</span> 
                        <div id="averageRating"></div>
                        <span itemprop="reviewCount">'.$productRating['countVote'].'</span> '.Yii::t('product','votes').'
                    </div>

                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span style="display: none;" itemprop="priceCurrency">RUB</span>
                        <link itemprop="availability" href="http://schema.org/InStock" />
                        <h3><span itemprop="price">' . $product->price . '</span> рублей</h3>        
                    </div>                            
                    <img itemprop="image" src="'.Yii::app()->createAbsoluteUrl('/images/product/' . $product->id.'.jpg'). '" title="' . $product->name . '" alt="' . $product->name . '" />
                    <p itemprop="description">' . $product->description . '</p> 
                    <span itemprop="sku">sku:'.$product->id.'</span>    
                </div>

                <script type="text/javascript">
                    $(function() {                            
                            $("#averageRating").raty({
                                readOnly : true,                                
                                score    : '.$productRating['averageRating'].'
                            });
                        });       
                </script>
       ';

$this->renderPartial('//product/_addToCart', array('product_id' => $product->id));
echo '     </div>';


echo '<div class="row"> <h2 class="span12">'.Yii::t('product','comments').'</h2></div>';

$criteria = array('product_id' => (integer) $product->id);
$comments = $Comment->getComments($criteria);
$comm_num = 1;
foreach ($comments as $comment) {
    echo '<div class="row" itemprop="review" itemscope itemtype="http://schema.org/Review">';
    echo '  <div class="span5 well">   
                    <strong itemprop="author">' . CHtml::encode($comment['author']) . '</strong>::
                    <span itemprop="name">' . CHtml::encode($comment['title']) . '</span>  
                     
                    <meta itemprop="datePublished" content="' . $comment['datePublished'] . '"><span class="muted">' . $comment['datePublished'] . '</span>
                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">                    
                    <span itemprop="ratingValue" style="display:none;">' . (int)$comment['ratingValue'] . '</span>  
                    <div id= "rating_'.$comm_num.'"></div>
                </div>
                <div itemprop="description">' . CHtml::encode($comment['description']) . '</div>
            </div>
        </div>
        
       <script type="text/javascript">
            $(function() {                    
                    $("#rating_'.$comm_num.'").raty({
                        readOnly : true,                        
                        score    : ' . (float)$comment['ratingValue'] . '
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