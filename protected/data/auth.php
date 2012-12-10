<?php
return array (
  'viewCatalog' => 
  array (
    'type' => 0,
    'description' => 'view all catalog with goods',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'viewProduct' => 
  array (
    'type' => 0,
    'description' => 'view some product',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'siteIndex' => 
  array (
    'type' => 0,
    'description' => 'site Index',
    'bizRule' => NULL,
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
      2 => 'siteIndex',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteNorights',
    ),
  ),
  'user' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'viewCatalog',
      1 => 'viewProduct',
      2 => 'siteIndex',
      3 => 'siteLogin',
      4 => 'siteLogout',
      5 => 'siteNorights',
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
      0 => 'siteIndex',
      1 => 'siteLogin',
      2 => 'siteLogout',
      3 => 'siteNorights',
    ),
  ),
);
