<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" > 
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"> 
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css">  
        <script src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.min.js'></script>
        <script src='<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js'></script> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <style type="text/css">
        body{
            padding-bottom: 70px;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
        }
        .navbar-fixed-top {
            position: static;	 
        } 
        .navbar .brand { width:250px;}
    </style>

    <body>        
        <?php $this->renderPartial('//layouts/_nav',array()); ?>

        <div class="container"> 
            <div class="row">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink' => CHtml::link('Главная', '/'),
                        'separator' => ' &rarr; ',
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
<?php endif ?>
            </div>      

<?php echo $content; ?>		

            <footer class='modal-footer' id='footer'>
                <div class="nav-collapse">            
                    <span class='span5'>
                        Copyright &copy; <?php echo date('Y'); ?> by Bob
<?php echo '     ' . round((memory_get_usage() / 1024 / 1024), 2) . ' Mb'; ?>
<?php echo Yii::powered(); ?>
                    </span>
                </div>
                <span class='span3' style='font-size: 24px;'>
                    &#9742; (000) 000-00-00
                </span>
            </footer>    
        </div>


    </body>
</html>
