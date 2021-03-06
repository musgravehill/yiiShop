<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,   
                'height' => 50,
                'minLength' => 2,
                'maxLength'=> 4,
                'offset' => -3,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {
        
        
        
        $this->render('index');
    }

    public function actionNorights() {

        $this->render('norights');
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        if (!Yii::app()->user->checkAccess('siteContact')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }


        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        //уже зареган 
        if (!Yii::app()->user->isGuest) {
            $this->redirect("/site/norights");
        }


        $loginForm = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($loginForm);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $loginForm->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($loginForm->validate() && $loginForm->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }


        // display the login form
        $this->render('login', array('model' => $loginForm));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    //TODO DELETE this after using
    public function actionCreateRBAC() {
        if (!Yii::app()->user->checkAccess('siteCreateRBAC')) {
            Yii::app()->user->loginRequired(); //благодаря этому Yii::app()->user->returnUrl знает предыдущую страницу
        }

        /*
         *  В каждом контроллере делаю "checkAccess". Если нельзя, то вызываю функцию "Yii::app()->user->loginRequired();"
         *  Благодаря этой функции в "Yii::app()->user->returnUrl"  записывается предыдущуя страница, которая вызвала проверку прав.
         *  Автоматом юзер редиректится на Логин. В Логине проверяется, если он уже зареган, то редиректится на НеХватаетПрав, иначе покажем
         *  форму логина.
         */

        $auth = Yii::app()->authManager;

        //сбрасываем все существующие правила
        $auth->clearAll();

        //base operation
        $bizRule = 'return ( (Yii::app()->user->id == $_GET["uid"]) OR (Yii::app()->user->role == "admin") );';
        $auth->createTask('siteIndex', 'site Index', $bizRule);
        $auth->createOperation('siteLogin', 'site Login');
        $auth->createOperation('siteLogout', 'site Logout');
        $auth->createOperation('siteContact', 'site Contact');
        $auth->createOperation('siteCreateRBAC', 'site CreateRBAC');
        $auth->createOperation('siteCaptcha', 'site Captcha');

        $auth->createOperation('changeUserRole', 'change UserRole');

        //shop
        $auth->createOperation('viewCatalog', 'view Catalog');
        $auth->createOperation('viewProduct', 'view Product');
        $auth->createOperation('myCart', 'my Cart');
        
        $auth->createOperation('addCommentProduct', 'add Comment to Product');
        

        //product crud
        $auth->createOperation('productAdmin', 'product Admin');
        $auth->createOperation('productCreate', 'product Create');
        $auth->createOperation('productDelete', 'product Delete');
        $auth->createOperation('productIndex', 'product Index');
        $auth->createOperation('productUpdate', 'product Update');
        $auth->createOperation('productView', 'product View');
        $auth->createOperation('productPerformAjaxValidation', 'product performAjaxValidation');
        $auth->createOperation('productLoadModel', 'load product Model');


        //noRights operation        
        $auth->createOperation('siteNorights', 'site Norights');

        //создаем роль для пользователя admin и указываем, какие операции он может выполнять
        $admin = $auth->createRole('admin');
        $admin->addChild('viewCatalog');
        $admin->addChild('viewProduct');
        $admin->addChild('myCart');

        $admin->addChild('changeUserRole');
        
        $admin->addChild('addCommentProduct');

        $admin->addChild('siteIndex');
        $admin->addChild('siteLogin');
        $admin->addChild('siteLogout');
        $admin->addChild('siteContact');
        $admin->addChild('siteCreateRBAC');
        $admin->addChild('siteCaptcha');
        $admin->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав

        $admin->addChild('productAdmin');
        $admin->addChild('productCreate');
        $admin->addChild('productDelete');
        $admin->addChild('productIndex');
        $admin->addChild('productUpdate');
        $admin->addChild('productView');
        $admin->addChild('productPerformAjaxValidation');
        $admin->addChild('productLoadModel');


        //создаем роль user и добавляем операции для неё
        $client = $auth->createRole('client');
        $client->addChild('viewCatalog');
        $client->addChild('viewProduct');
        $client->addChild('myCart');
        
        $client->addChild('addCommentProduct');

        $client->addChild('siteIndex');
        $client->addChild('siteLogin');
        $client->addChild('siteLogout');
        $client->addChild('siteCaptcha');
        $client->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав 
        //    
        //guest default role
        $guest = $auth->createRole('guest');
        $guest->addChild('viewCatalog');
        $guest->addChild('viewProduct');
        $guest->addChild('myCart');

        $guest->addChild('siteLogin');
        $guest->addChild('siteLogout');
        $guest->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав


        $auth->save();

        $this->render('CreateRBAC');
    }

    public function actionRegister() {
        $model = new User('register');
        $regReady = false;

        // uncomment the following code to enable ajax-based validation

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }


        if (isset($_POST['User'])) {
            $_POST['User']['role'] = 'register';
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $model->save();
                $regReady = true;
            }
        }
        $this->render('register', array('model' => $model, 'regReady' => $regReady));
    }
    
    public function actionSetLanguage() {
        $currentLang = Yii::app()->language;
        $languages = array_keys(Yii::app()->params->languages);        
        if ( (isset($_POST['language'])) && (in_array($_POST['language'], $languages)) ) {
            Yii::app()->language = $_POST['language'];
            Yii::app()->user->setState('language', $_POST['language']);
            $cookie = new CHttpCookie('language', $_POST['language']);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::app()->request->cookies['language'] = $cookie;
        }
        $this->render('setlanguage', array('currentLang'=>$currentLang,'languages'=>Yii::app()->params->languages));
    }

}