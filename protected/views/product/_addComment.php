<?php
echo CHtml::beginForm('','POST',array('class' => 'form well span5',));
echo '
    <div id="add_rating"></div>
    <script type="text/javascript">
            $(function() {                    
                    $("#add_rating").raty({                        
                        half  : true,
                        score: 5,
                        click: function(score, evt) {                            
                            $("#addComment_ratingValue").val(score);                            
                        }
                    });
                });       
      </script><br>';

echo CHtml::hiddenField('addComment[ratingValue]', 5);
echo CHtml::textarea('addComment[title]', '', array('placeholder' => 'title','class'=>'span4'));
echo CHtml::textarea('addComment[description]', '', array('placeholder' => 'description','class'=>'span4'));
echo CHtml::hiddenField('addComment[product_id]', $product_id);
echo CHtml::submitButton(Yii::t('product','add comment'), array('class' => 'btn btn-primary'));
echo CHtml::endForm();
?>
