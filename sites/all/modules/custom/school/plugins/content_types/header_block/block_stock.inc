<?php
/**
 * @file
 * Ctools content type
 */

/**
 * Implements hook_ctools_content_types().
 */
function school_header_block_ctools_content_types() {
  return array(
    'single' => TRUE,
    'title' => t('header block'),
    'all contexts' => TRUE,
    'category' => t('School'),
    'hook theme' => 'school_header_block_content_type_theme',
  );
}

/**
 * Implements hook_content_type_render().
 */
function school_header_block_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $block->content = theme('school_header_block');

  return $block;
}

/**
 * Implements hook_content_type_theme().
 */
function school_header_block_content_type_theme(&$theme, $plugin) {
  $theme['school_header_block'] = array(
    'path' => $plugin['path'],
    'template' => 'school-header-block',
  );
}

/**
 * Process variables for realty-block-stock.tpl.php.
 */
function template_preprocess_school_header_block(&$vars) {

}