<?php

/**
* Process variables for page.tpl.php.
*/
function school_theme_preprocess_page(&$vars) {
  global $user;

  // Get site logo.
  $logo = theme('image', array(
    'path' => theme_get_setting('logo_path'),
    'alt' => t(variable_get('site_name')),
    'title' => t(variable_get('site_name')),
    'height' => '138px',
  ));

  $vars['logo'] = l($logo, '', array(
    'html' => TRUE,
    'attributes' => array('class' => 'logo',)
  ));

  $vars['header_image'] = theme('image', array(
    'path' => SCHOOL_FRONT_THEME_PATH . '/images/header-image.jpg',
    'title' => t('Close'),
  ));

  $vars['view'] = views_embed_view('taxonomy', 'partners');

  $vars['top_menu'] = menu_tree('menu-menu-top');
  /*foreach ($top_menu as $key => $item) {
    $vars['menu_top'][$key] = array(
      'item' => array(
        'title' => $item['link']['link_title']
        ),
    );
    if (!empty($item['below'])) {
      foreach ($item['below'] as $k => $val) {
        $vars['menu_top'][$key]['item'][$k] = array(
          'sub_item' => l($val['link']['link_title'], $val['link']['link_path']),
        );
      }
    }
  }*/
  $a = 1;
}


/**
 * Preprocess variables for node.
 */
function school_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];
  $view_mode = $vars['view_mode'];

  $vars['theme_hook_suggestions'][] = 'node__' . $view_mode;
  $vars['theme_hook_suggestions'][] = 'node__' . $node->type . '_' . str_replace('-', '_', $view_mode);

  $preprocesses[] = 'school_preprocess_node__' . $view_mode;
  $preprocesses[] = 'school_preprocess_node__' . $node->type;
  $preprocesses[] = 'school_preprocess_node__' . $node->type . '_' . str_replace('-', '_', $view_mode);

  foreach ($preprocesses as $preprocess) {
    if (function_exists($preprocess)) {
      $preprocess($vars, $hook);
    }
  }
}

/**
 * Process variables for views-exposed-form.tpl.php.
 */
function school_preprocess_views_exposed_form(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view.tpl.php.
 */
function school_preprocess_views_view(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view-unformatted.tpl.php.
 */
function school_preprocess_views_view_unformatted(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view-fields.tpl.php.
 */
function school_preprocess_views_view_fields(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view-grid.tpl.php.
 */
function school_preprocess_views_view_grid(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view-table.tpl.php.
 */
function school_preprocess_views_view_table(&$vars) {
  if (isset($vars['theme_hook_suggestion'])) {
    $function = 'school_preprocess_' . $vars['theme_hook_suggestion'];
    if (function_exists($function)) {
      $function($vars);
    }
  }
}

/**
 * Process variables for views-view-unformatted--taxonomy--partners.
 */
function school_preprocess_views_view_unformatted__taxonomy__partners(&$vars) {

  foreach($vars['view']->result as $key => $value) {
    $logo = theme('image', array(
      'path' => $value->field_field_logo[0]['raw']['uri'],
      'title' => $value ->taxonomy_term_data_name,
      'alt' => $value ->taxonomy_term_data_name,));
    $vars['partners'][$key]['logo'] = l($logo, $value->field_field_sites[0]['raw']['value'], array('html' => TRUE));
  }
}