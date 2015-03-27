<?php
/**
 * @file
 * Ctools content type
 */

/**
 * Implements hook_ctools_content_types().
 */
function school_footer_block_ctools_content_types() {
  return array(
    'single' => TRUE,
    'title' => t('footer block'),
    'all contexts' => TRUE,
    'category' => t('School'),
    'hook theme' => 'school_footer_block_content_type_theme',
  );
}

/**
 * Implements hook_content_type_render().
 */
function school_footer_block_content_type_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();
  $block->content = theme('school_footer_block');

  return $block;
}

/**
 * Implements hook_content_type_theme().
 */
function school_footer_block_content_type_theme(&$theme, $plugin) {
  $theme['school_footer_block'] = array(
    'path' => $plugin['path'],
    'template' => 'school-footer-block',
  );
}

/**
 * Process variables for realty-block-stock.tpl.php.
 */
function template_preprocess_school_footer_block(&$vars) {
 $a = 1;
}