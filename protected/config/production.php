<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'yiiShop',
    'theme' => 'twitt', //only layots there  //twitt or metro     
    'sourceLanguage' => 'en',
    'language' => 'en',   
    // preloading 'log' component
    //'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        
    ),
    // application components
    'components' => array(
        'request' => array(
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true, //не напрямую через $_COOKIES!!  A $cookie=new CHttpCookie($name,$value); Yii::app()->request->cookies[$name] =$cookie;
            'csrfCookie' => array(
                'httpOnly' => true,
            ),
        ),
        'session' => array(
            'class' => 'CHttpSession',
            'cookieMode' => 'only',
            'cookieParams' => array(
                'httponly' => true,
                'lifetime' => 3600 * 6,
            ),
            'sessionName' => 'yiishop',
            'timeout' => 3600,
        // 'savePath' => '',
        ),
        'user' => array(
            // enable cookie-based authentication            
            'allowAutoLogin' => true,
            'loginUrl' => '/site/login',
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                'catalog' => 'catalog/viewcatalog',  //<lang:(en|de|ru)>
                '<productURL:.*\.html>' => 'product/viewproduct',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),        
        'cache' => array(
            'class' => 'system.caching.CDummyCache',  //CDummyCache //CMemCache
            /*'servers' => array(
                array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
                //array('host'=>'server2', 'port'=>11211, 'weight'=>40),
            ),*/
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yiishop',
            'emulatePrepare' => true,
            'username' => 'yiishop',
            'password' => 'yiishop',
            'charset' => 'utf8',
            'tablePrefix' => 'yii_',
            // включить кэширование схем для улучшения производительности
            'schemaCachingDuration' => 3600,
            'enableProfiling' => false,
            'enableParamLogging' => false,
        ),        
        'authManager' => array(
            'class' => 'CPhpAuthManager',
            'defaultRoles' => array('guest'),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => '/site/error',
        ),
        /*'log' => array(            
            'class' => 'CLogRouter', /*
            'routes' => array(
                array(//sql                   
                    'class' => 'CProfileLogRoute',
                    'levels' => 'profile,',
                    'enabled' => true,
                ), 
              array(  //application stack
              'class' => 'CWebLogRoute',
              ), 
            ), 
        ), */       
        'messages' => array(   //t::lang
            'class' => 'CPhpMessageSource',
            //'basePath'=> null, //'basePath' => realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages/ru'),
            'cachingDuration' => 100,
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'mdeed@mail.ru',
        'languages'=>array('en'=>'English', 'ru'=>'Русский'),
        'imagesProductRoot'=>'images/product', //     images/product
        
    ),
);

