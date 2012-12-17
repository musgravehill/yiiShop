<div id="language-select">
<?php             
        echo CHtml::beginForm('','POST',array('class' => 'form-horizontal span5',));        
        echo CHtml::dropDownList('language', $currentLang, $languages); 
        echo CHtml::submitButton('ok', array('class' => 'btn btn-success'));
        echo CHtml::endForm();    
?>
</div>