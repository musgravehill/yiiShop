<?php

$this->pageTitle = Yii::t('catalog', 'Catalog') . ' ' . Yii::app()->name;
$this->breadcrumbs = array(Yii::t('catalog', 'Catalog'),);

echo '<h1>' . Yii::t('catalog', 'Catalog') . '</h1>';
?>


<?php

$this->renderPartial('//catalog/_sort', array('priceMax' => $priceMax, 'priceRangeMin' => $priceRangeMin, 'priceRangeMax' => $priceRangeMax));
foreach ($products as $product) {
    $imageLink = Yii::app()->createAbsoluteUrl(Yii::app()->params['imagesProductRoot'] . '/' . $product->image);
    echo '
        <div class="span5 well" style="height:260px;">
            <h4><a href="/catalog/' . $product->url . '" title="подробно о ' . $product->name . '" >' . $product->name . '</a></h4>
            <h3 title="продажа">' . $product->price . ' рублей</h3>   
            <img data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="' . $imageLink . '" class="thumbnail" alt="' . $product->name . '" />             
        </div>        
       ';
}
?>