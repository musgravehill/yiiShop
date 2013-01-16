<?php
return array (
  'siteIndex' => 
  array (
    'type' => 1,
    'description' => 'site Index',
    'bizRule' => 'return ( (Yii::app()->user->id == $_GET["uid"]) OR (Yii::app()->user->role == "admin") );',
    'data' => NULL,
  ),
  'siteLogin' => 
  array (
    'type' => 0,
    'description' => 'site Login',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteLogout' => 
  array (
    'type' => 0,
    'description' => 'site Logout',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteContact' => 
  array (
    'type' => 0,
    'description' => 'site Contact',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteCreateRBAC' => 
  array (
    'type' => 0,
    'description' => 'site CreateRBAC',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteCaptcha' => 
  array (
    'type' => 0,
    'description' => 'site Captcha',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'changeUserRole' => 
  array (
    'type' => 0,
    'description' => 'change UserRole',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'viewCatalog' => 
  array (
    'type' => 0,
    'description' => 'view Catalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'viewProduct' => 
  array (
    'type' => 0,
    'description' => 'view Product',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'myCart' => 
  array (
    'type' => 0,
    'description' => 'my Cart',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'addCommentProduct' => 
  array (
    'type' => 0,
    'description' => 'add Comment to Product',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productAdmin' => 
  array (
    'type' => 0,
    'description' => 'product Admin',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productCreate' => 
  array (
    'type' => 0,
    'description' => 'product Create',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productDelete' => 
  array (
    'type' => 0,
    'description' => 'product Delete',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productIndex' => 
  array (
    'type' => 0,
    'description' => 'product Index',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productUpdate' => 
  array (
    'type' => 0,
    'description' => 'product Update',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productView' => 
  array (
    'type' => 0,
    'description' => 'product View',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productPerformAjaxValidation' => 
  array (
    'type' => 0,
    'description' => 'product performAjaxValidation',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'productLoadModel' => 
  array (
    'type' => 0,
    'description' => 'load product Model',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteNorights' => 
  array (
    'type' => 0,
    'description' => 'site Norights',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'viewCatalog',
      1 => 'viewProduct',
      2 => 'myCart',
      3 => 'changeUserRole',
      4 => 'addCommentProduct',
      5 => 'siteIndex',
      6 => 'siteLogin',
      7 => 'siteLogout',
      8 => 'siteContact',
      9 => 'siteCreateRBAC',
      10 => 'siteCaptcha',
      11 => 'siteNorights',
      12 => 'productAdmin',
      13 => 'productCreate',
      14 => 'productDelete',
      15 => 'productIndex',
      16 => 'productUpdate',
      17 => 'productView',
      18 => 'productPerformAjaxValidation',
      19 => 'productLoadModel',
    ),
    'assignments' => 
    array (
      1 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'client' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'viewCatalog',
      1 => 'viewProduct',
      2 => 'myCart',
      3 => 'addCommentProduct',
      4 => 'siteIndex',
      5 => 'siteLogin',
      6 => 'siteLogout',
      7 => 'siteCaptcha',
      8 => 'siteNorights',
    ),
  ),
  'guest' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'viewCatalog',
      1 => 'viewProduct',
      2 => 'myCart',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteNorights',
    ),
  ),
);
