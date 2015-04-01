<?php
/**
 * @file
 * Ctools content type
 */

/**
 * Implements hook_ctools_content_types().
 */
function school_menu_left_ctools_content_types() {
  return array(
    'single' => TRUE,
    'title' => t('Menu left'),
    'all contexts' => TRUE,
    'category' => t('School'),
    'hook theme' => 'school_menu_left_content_type_theme',
  );
}

/**
 * Implements hook_content_type_render().
 */
function school_menu_left_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $block->content = theme('school_menu_left');

  return $block;
}

/**
 * Implements hook_content_type_theme().
 */
function school_menu_left_content_type_theme(&$theme, $plugin) {
  $theme['school_menu_left'] = array(
    'path' => $plugin['path'],
    'template' => 'school-menu-left',
  );
}

/**
 * Process variables for realty-block-stock.tpl.php.
 */
function template_preprocess_school_menu_left(&$vars) {
  $menu = menu_tree('menu-menu-left');
  $vars['menu'] = render($menu);
}