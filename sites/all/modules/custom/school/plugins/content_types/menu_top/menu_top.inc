<?php
/**
 * @file
 * Ctools content type
 */

/**
 * Implements hook_ctools_content_types().
 */
function school_menu_top_ctools_content_types() {
  return array(
    'single' => TRUE,
    'title' => t('Menu top'),
    'all contexts' => TRUE,
    'category' => t('School'),
    'hook theme' => 'school_menu_top_content_type_theme',
  );
}

/**
 * Implements hook_content_type_render().
 */
function school_menu_top_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $block->content = theme('school_menu_top');

  return $block;
}

/**
 * Implements hook_content_type_theme().
 */
function school_menu_top_content_type_theme(&$theme, $plugin) {
  $theme['school_menu_top'] = array(
    'path' => $plugin['path'],
    'template' => 'school-menu-top',
  );
}

/**
 * Process variables for realty-block-stock.tpl.php.
 */
function template_preprocess_school_menu_top(&$vars) {
  $menu = menu_tree('menu-menu-top');
  $vars['menu'] = render($menu);
}