<?php
echo CHtml::beginForm('','POST',array('class' => 'form-horizontal span2',));
echo CHtml::textField('addToCart[quantity]', 1, array('placeholder' => 'количество','class'=>'input-mini'));
echo CHtml::hiddenField('addToCart[product_id]', $product_id);
echo CHtml::submitButton('в корзину', array('class' => 'btn btn-success'));
echo CHtml::endForm();
?>
