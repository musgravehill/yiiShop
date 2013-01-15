<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jqx/jqx.base.css"> 
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jqx/jqx.metro.css"> 
<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jqx/jqxcore.js'></script>
<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jqx/jqxslider.js'></script>
<script src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jqx/jqxbuttons.js'></script>
<script type="text/javascript">
    $(document).ready(function () { 
            
        try {
            $('#priceRange').jqxSlider({ 
                theme: 'metro',
                rangeSlider: true,
                width:"600px",                    
                mode: 'fixed',
                step: 100,                    
                min: 0, 
                max: <?php echo $priceMax; ?>, 
                values: [<?php echo $priceRangeMin; ?>, <?php echo $priceRangeMax; ?>],                     
                showTicks: true,
                ticksPosition:'bottom',
                ticksFrequency: <?php echo round($priceMax / 20) + 2; ?>,
                showButtons: false                    
            });             
            
                
        } catch (e) {
            alert(e);
        }
        
        $('#priceRange').bind('change', function (event) {      
            $('#priceMin').html(Math.round($('#priceRange').jqxSlider('value').rangeStart) +'р.');
            $('#priceMax').html(Math.round($('#priceRange').jqxSlider('value').rangeEnd)+'р.');
            
            $('#priceRangeMin').val(Math.round($('#priceRange').jqxSlider('getValue').rangeStart));
            $('#priceRangeMax').val(Math.round($('#priceRange').jqxSlider('getValue').rangeEnd));                
        });      
           
    });
</script>

<div class="row well" >
    <?php
    echo CHtml::beginForm('', 'POST', array('class' => 'form-horizontal',));
    echo '                    
        <div class="span6">
            <span class="pull-left" id="priceMin">'.$priceRangeMin.'р.</span>
            <span class="pull-right" id="priceMax">'.$priceRangeMax.'р.</span>
        </div>
        <br>
        <div class="span6" id="priceRange"></div>
        <span class="span1">&nbsp;</span>     ';
    echo CHtml::hiddenField('filter[priceRangeMin]', $priceRangeMin, array('id' => 'priceRangeMin'));
    echo CHtml::hiddenField('filter[priceRangeMax]', $priceRangeMax, array('id' => 'priceRangeMax'));
    echo CHtml::submitButton(Yii::t('catalog', 'show'), array('class' => 'btn btn-primary'));
    echo CHtml::endForm();
    ?>
</div>
