<?php

$this->pageTitle = $product->name;
$this->breadcrumbs = array('каталог'=>array('/catalog'), $product->name);
echo '
        <div class="span12">
            <h1>' . $product->name . '</a></h1>
            <h3>' . $product->price . ' рублей</h3>               
            <img src="/images/product/' . $product->id . '.jpg" title="" alt="" />
            <p>' . $product->description . ' рублей</p>    
        </div>
       ';
?>