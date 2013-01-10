<?php
echo CHtml::beginForm('','POST',array('class' => 'form well span5',));
echo CHtml::dropDownList('addComment[ratingValue]', '', 
              array('5' => 'A++', 
                  '4' => 'good enough',
                  '3'=>'not good',
                  '2'=>'bad',
                  '1'=>'OMG! BAD!',
                  ));
echo CHtml::textarea('addComment[title]', '', array('placeholder' => 'title','class'=>'span4'));
echo CHtml::textarea('addComment[description]', '', array('placeholder' => 'description','class'=>'span4'));
echo CHtml::hiddenField('addComment[product_id]', $product_id);
echo CHtml::submitButton('Yii::t добавить отзыв', array('class' => 'btn btn-primary'));
echo CHtml::endForm();
?>
