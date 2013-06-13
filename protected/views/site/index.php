<?php
$this->pageTitle=Yii::app()->name;

?>
<div class="row">



<?php
$tags = Tags::model()->findAll("1=1 ORDER BY tag_name ASC");
foreach ($tags as $tag){
    echo '<h2><a href="/catalog?&productTag='.$tag['id'].'" >'.$tag['tag_name'].'</a></h2>';
}
?>
</div>