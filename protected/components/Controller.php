<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);        
        // Set the application language if provided by GET, session or cookie
        if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
        else if (isset(Yii::app()->request->cookies['language']))
            Yii::app()->language = Yii::app()->request->cookies['language']->value;
    }   

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    //public $layout='//layouts/main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    protected function beforeAction($action) {
        /*
          if (Yii::app()->user->checkAccess($this->getId() . ucfirst($this->getAction()->getId()))) {
          return true;
          } else { //403 forbidden
          echo '<span style="color:red;">'. $this->getId() . ucfirst($this->getAction()->getId()).'</span>';
          //Yii::app()->request->redirect(Yii::app()->user->loginUrl);
          } */
        //Yii::app()->request->redirect(Yii::app()->user->returnUrl); - url before loginPage

        return true;
    }

}