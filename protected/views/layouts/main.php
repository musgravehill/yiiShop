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
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <div class="nav-collapse">
                        <a class="brand" href="/">
                            <?php
                            echo CHtml::encode(Yii::app()->name);

                            ///$this->renderPartial('_view', array('data'=>$model,));
                            ?>                        
                        </a>
                    </div><!--/.nav-collapse -->    
                    <ul class="nav nav-pills"> 

                    </ul>  
                    <ul class="nav nav-pills">   
                        <?php if (Yii::app()->user->isGuest) {
                            echo '<a href="/site/login">Login</a>';
                        } ?>		
                    </ul>  
                    <ul class="nav nav-pills"> 
                        <li class="dropdown">  
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Пример <i class="icon-white icon-shopping-cart"></i></a>  
                            <ul class="dropdown-menu">  
                                <li><a href="">чоткакт</a></li>
                                <li><a href="">чоткакт2</a></li>
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Home', 'url' => array('/site/index')),
                                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                        array('label' => 'Contact', 'url' => array('/site/contact')),
                                        array('label' => 'Каталог', 'url' => array('/shop/catalog')),
                                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                    ),
                                ));
                                ?>
                            </ul>  
                        </li>
                    </ul>    
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        echo '
                  <div class="btn-group pull-right">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user"></i>' . Yii::app()->user->name . '
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/ff">ffff</a></li>                          
                        <li class="divider"></li>
                        <li><a href="/site/logout">Выход</a></li>          
                    </ul>
                </div>      
                        ';
                    }
                    ?>


                </div>
            </div>
        </div>


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
