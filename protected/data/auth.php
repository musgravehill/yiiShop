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
  'shopCatalog' => 
  array (
    'type' => 0,
    'description' => 'shop Catalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'shopProduct' => 
  array (
    'type' => 0,
    'description' => 'shop Product',
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
      0 => 'shopCatalog',
      1 => 'shopProduct',
      2 => 'myCart',
      3 => 'siteIndex',
      4 => 'siteLogin',
      5 => 'siteLogout',
      6 => 'siteContact',
      7 => 'siteCreateRBAC',
      8 => 'siteCaptcha',
      9 => 'siteNorights',
      10 => 'productAdmin',
      11 => 'productCreate',
      12 => 'productDelete',
      13 => 'productIndex',
      14 => 'productUpdate',
      15 => 'productView',
      16 => 'productPerformAjaxValidation',
      17 => 'productLoadModel',
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
      0 => 'shopCatalog',
      1 => 'shopProduct',
      2 => 'myCart',
      3 => 'siteIndex',
      4 => 'siteLogin',
      5 => 'siteLogout',
      6 => 'siteCaptcha',
      7 => 'siteNorights',
    ),
    'assignments' => 
    array (
      47 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      48 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      49 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      50 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      51 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      52 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
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
      0 => 'shopCatalog',
      1 => 'shopProduct',
      2 => 'myCart',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteNorights',
    ),
  ),
);
