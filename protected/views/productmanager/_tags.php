<?php
$tags = Tags::model()->findAll("1=1 ORDER BY tag_name ASC");
echo CHtml::beginForm('', 'POST', array('class' => 'form-inline well span3', 'id' => ''));
echo '<h4>tags</h4>';
echo '<div class="control-group"><label class="control-label">        
    </label><div class="controls">
    <select class="placeholder input-xlarge" multiple="multiple" title="tags" name="productTags[]" id="productTags">';
foreach ($tags as $tag) {
    echo '<option value="' . $tag['id'] . '">' . $tag['tag_name'] . '</option>';
}
echo '</select></div></div>';
echo CHtml::submitButton('save', array('class' => 'btn btn-primary'));
echo CHtml::endForm();
?>

<script src="/themes/twitt/select2/select2.js"></script>
<link href="/themes/twitt/select2/select2.css" rel="stylesheet"/>
<script src="/themes/twitt/select2/select2_locale_ru.js"></script>
<script>
    $(document).ready(function() {           
        $("#productTags").val([
<?php
$productTags = ProductsTags::model()->findAll(" product_id = ".$model->id);
foreach ($productTags as $productTag) {
    echo '"' . $productTag['tag_id'] . '",';
}
?>
                                        ]).select2({});  
                                    });      
</script>