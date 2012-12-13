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
                            echo '<li><a href="/site/login">Login</a></li>';
                            echo '<li><a href="/site/register">Регистрация</a></li>';
                        } ?>		
                    </ul>  
                    
                    <ul class="nav nav-pills">   
                        <?php if (Yii::app()) {
                            echo '<li><a href="/product/admin">Управление товарами</a></li>';
                        } ?>		
                    </ul>  
                    <ul class="nav nav-pills">   
                        <?php if (Yii::app()) {
                            echo '<li><a href="/catalog">Каталог</a></li>';
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
                    
                    <div class="btn-group pull-right">
                        <ul class="nav nav-pills">                               
                           <li><a href="/shop/mycart">корзина</a></li>                            		
                        </ul>                         
                    </div>  
                    
                    
                    
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