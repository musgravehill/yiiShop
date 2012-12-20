<?php
echo CHtml::beginForm('','POST',array('class' => 'form well span5',));
echo CHtml::textarea('addComment[comment]', '', array('placeholder' => 'comment','class'=>'span4'));
echo CHtml::hiddenField('addComment[product_id]', $product_id);
echo CHtml::submitButton('::t добавить отзыв', array('class' => 'btn btn-primary'));
echo CHtml::endForm();
?>
