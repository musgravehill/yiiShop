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
      0 => 'siteLogin',
      1 => 'siteLogout',
      2 => 'siteNorights',
    ),
  ),
);
