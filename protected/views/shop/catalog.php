<?php
$this->pageTitle = 'Каталог ' . Yii::app()->name;
$this->breadcrumbs = array('Каталог',);
?>
<h1>Каталог товаров</h1>
<?php
foreach ($products as $product) {
    echo '
        <div class="span5">
            <h3><a href="/catalog/'.$product->url.'" title="подробно о '.$product->name.'" >'.$product->name.'</a></h3>
            <h3>'.$product->price.' рублей</h3>    
            <img src="/images/product/'.$product->id.'.jpg" title="" alt="" />             
        </div>
       ';
}
?>