<?php
$this->pageTitle = Yii::t('catalog','Catalog') .' '. Yii::app()->name;
$this->breadcrumbs = array(Yii::t('catalog','Catalog'),);

echo '<h1>'.Yii::t('catalog','Catalog').'</h1>';
?>


<?php
$this->renderPartial('//catalog/_sort', array('priceMax'=>$priceMax,'priceRangeMin'=>$priceRangeMin,'priceRangeMax'=>$priceRangeMax));
foreach ($products as $product) {
    echo '
        <div class="span5 well" style="height:260px;">
            <h3><a href="/catalog/' . $product->url . '" title="подробно о ' . $product->name . '" >' . $product->name . '</a></h3>
            <h3>' . $product->price . ' рублей</h3>   
            <ul class="thumbnails">
               <li class="span4">    
                    <img src="/images/product/' . $product->id . '.jpg" title="" alt="" />  
                </li> 
            </ul>    
        </div>
       ';
}
?>