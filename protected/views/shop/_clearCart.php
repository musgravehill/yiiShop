<?php
echo CHtml::beginForm('','POST',array('class' => 'form-horizontal span2',));
echo CHtml::hiddenField('clearCart',true);
echo CHtml::submitButton('очистить корзину', array('class' => 'btn btn-danger'));
echo CHtml::endForm();
?>
