<?php
echo CHtml::beginForm('','POST',array('class' => 'form-horizontal',));
echo CHtml::hiddenField('placeOrder', true);
echo CHtml::submitButton('оформить', array('class' => 'btn btn-success'));
echo CHtml::endForm();
?>
