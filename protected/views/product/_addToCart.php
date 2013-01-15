<?php
echo CHtml::beginForm('', 'POST', array('class' => 'form-inline pull-right',));
echo '<span class="label label-success">' . Yii::t('product', 'in stock: ') . $product_stock . '</span>&nbsp;';
echo CHtml::textField('addToCart[quantity]', 1, array('placeholder' => 'количество', 'class' => 'input-mini'));
echo CHtml::hiddenField('addToCart[product_id]', $product_id);
echo CHtml::submitButton(Yii::t('product', 'add to cart'), array('class' => 'btn btn-success'));
echo CHtml::endForm();
?>
