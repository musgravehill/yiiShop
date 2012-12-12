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
      2 => 'siteIndex',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteContact',
      6 => 'siteCreateRBAC',
      7 => 'siteCaptcha',
      8 => 'siteNorights',
      9 => 'productAdmin',
      10 => 'productCreate',
      11 => 'productDelete',
      12 => 'productIndex',
      13 => 'productUpdate',
      14 => 'productView',
      15 => 'productPerformAjaxValidation',
      16 => 'productLoadModel',
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
      2 => 'siteIndex',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteCaptcha',
      6 => 'siteNorights',
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
      2 => 'siteLogin',
      3 => 'siteLogout',
      4 => 'siteNorights',
    ),
  ),
);
