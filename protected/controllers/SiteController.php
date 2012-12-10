<?php

class SiteController extends bobController {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->user);
         
        
        $this->render('index');        
        
    }
    
    public function  actionNorights() {         
        
        $this->render('norights');    
    }  
    

    /**
     * This is the action to handle external exceptions.
     */
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
        
        //если Гость - иди логинься
        if (!Yii::app()->user->isGuest) { $this->redirect("/index.php?r=site/norights"); } 
        
        
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
            //Yii::app()->request->redirect(Yii::app()->user->returnUrl); - from guideManual
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

        $auth = Yii::app()->authManager;

        //сбрасываем все существующие правила
        $auth->clearAll();
        
        //base operation
        $bizRule = 'return Yii::app()->user->id== $_GET["uid"];';
        $auth->createTask('siteIndex', 'site Index',$bizRule);  //Controller: $this->getId() . ucfirst($this->getAction()->getId());
        $auth->createOperation('siteLogin', 'site Login'); 
        $auth->createOperation('siteLogout', 'site Logout'); 
        $auth->createOperation('siteContact', 'site Contact');
        $auth->createOperation('siteCreateRBAC','site CreateRBAC');
        
        //noRights operation        
        $auth->createOperation('siteNorights', 'site Norights');        

        //создаем роль для пользователя admin и указываем, какие операции он может выполнять
        $admin = $auth->createRole('admin');         
        $admin->addChild('siteIndex');  
        $admin->addChild('siteLogin');  
        $admin->addChild('siteLogout');  
        $admin->addChild('siteContact');
        $admin->addChild('siteCreateRBAC');
        $admin->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав

        //создаем роль user и добавляем операции для неё
        $client = $auth->createRole('client');         
        $client->addChild('siteIndex');  
        $client->addChild('siteLogin');  
        $client->addChild('siteLogout');
        $client->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав     
        
        //guest default role
        $guest = $auth->createRole('guest');  
        //$guest->addChild('siteIndex');        
        $guest->addChild('siteLogin');   
        $guest->addChild('siteLogout');
        $guest->addChild('siteNorights'); //сюда будем редиректить, если не хватает прав
     
        
        $auth->save();

        $this->render('CreateRBAC');
    }

}