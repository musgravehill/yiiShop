<?php
echo CHtml::beginForm('','POST',array('class' => 'form-horizontal',));
echo CHtml::textField('addToCart[quantity]', 1, array('placeholder' => 'количество','class'=>'input-mini'));
echo CHtml::hiddenField('addToCart[product_id]', $product_id, array('placeholder' => 'количество','class'=>'input-mini'));
echo CHtml::submitButton('в корзину', array('class' => 'btn btn-success'));
echo CHtml::endForm();
?>
