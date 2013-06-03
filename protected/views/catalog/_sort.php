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
    //echo CHtml::beginForm('', 'GET', array('class' => 'form-horizontal',));
    echo '   
        <form method="GET" class="form-inline">
            <div style="width:600px;">
                <span class="pull-left" id="priceMin">'.$priceRangeMin.'р.</span>
                <span class="pull-right" id="priceMax">'.$priceRangeMax.'р.</span>       
                <div class="pull-left" id="priceRange"></div>
            </div>
        <span class="span5">
            <a href="/gf">Воблеры</a> 
            <a href="/gf">Воблеры</a>
            <a href="/gf">Воблеры</a>
            <a href="/gf">Воблеры</a>
            <a href="/gf">Леска</a>
            <a href="/gf">Леска</a>
            <a href="/gf">Леска</a>
            <a href="/gf">Леска</a>
            <a href="/gf">Леска</a>
            <a href="/gf">Мормышки</a>
            <a href="/gf">Мормышки</a>
            <a href="/gf">Мормышки</a>
            <a href="/gf">Мормышки</a>
            
        </span>     ';
    //echo CHtml::hiddenField('priceRangeMin', $priceRangeMin, array('id' => 'priceRangeMin'));
    //echo CHtml::hiddenField('priceRangeMax', $priceRangeMax, array('id' => 'priceRangeMax'));
    echo '<button type="submit" class="btn btn-primary pull-right">'.Yii::t('catalog', 'show').'</button>';
    //echo CHtml::submitButton(Yii::t('catalog', 'show'), array('class' => 'btn btn-primary'));
    //echo CHtml::endForm();
    echo '</form>';
    ?>
</div>
