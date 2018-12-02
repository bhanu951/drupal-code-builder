<?php $data =
array (
  'primary' => 
  array (
    'current_user' => 
    array (
      'id' => 'current_user',
      'label' => 'Current active user',
      'static_method' => 'currentUser',
      'interface' => '\\Drupal\\Core\\Session\\AccountProxyInterface',
      'description' => 'The current active user',
    ),
    'entity_type.manager' => 
    array (
      'id' => 'entity_type.manager',
      'label' => 'Entity type manager',
      'static_method' => 'entityTypeManager',
      'interface' => '\\Drupal\\Core\\Entity\\EntityTypeManagerInterface',
      'description' => 'The entity type manager',
    ),
    'module_handler' =>
    array (
      'id' => 'module_handler',
      'label' => 'Module handler',
      'static_method' => 'moduleHandler',
      'interface' => '\\Drupal\\Core\\Extension\\ModuleHandlerInterface',
      'description' => 'The module handler',
    ),
  ),
  'all' => 
  array (
    'current_user' => 
    array (
      'id' => 'current_user',
      'label' => 'Current active user',
      'static_method' => 'currentUser',
      'interface' => '\\Drupal\\Core\\Session\\AccountProxyInterface',
      'description' => 'The current active user',
    ),
    'entity_type.manager' => 
    array (
      'id' => 'entity_type.manager',
      'label' => 'Entity type manager',
      'static_method' => 'entityTypeManager',
      'interface' => '\\Drupal\\Core\\Entity\\EntityTypeManagerInterface',
      'description' => 'The entity type manager',
    ),
    'module_handler' =>
    array (
      'id' => 'module_handler',
      'label' => 'Module handler',
      'static_method' => 'moduleHandler',
      'interface' => '\\Drupal\\Core\\Extension\\ModuleHandlerInterface',
      'description' => 'The module handler',
    ),
    'cache.discovery' =>
    array (
      'id' => 'cache.discovery',
      'label' => 'Cache Backend Interface',
      'static_method' => '',
      'interface' => '',
      'description' => 'The Cache Backend Interface service',
    ),
  ),
);