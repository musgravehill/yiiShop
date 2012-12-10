<?php
return array (
  'siteIndex' => 
  array (
    'type' => 1,
    'description' => 'site Index',
    'bizRule' => 'return Yii::app()->user->id== $_GET["uid"];',
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
      0 => 'siteIndex',
      1 => 'siteLogin',
      2 => 'siteLogout',
      3 => 'siteContact',
      4 => 'siteCreateRBAC',
      5 => 'siteNorights',
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
      0 => 'siteIndex',
      1 => 'siteLogin',
      2 => 'siteLogout',
      3 => 'siteNorights',
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
