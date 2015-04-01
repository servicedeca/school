<?php


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

/**
 * Process variables for menu_tree__menu-menu-top.tpl.php.
 */
function school_theme_preprocess_menu_link__menu_menu_top(&$vars) {
    $element = $vars['element'];
    $sub_menu = '';
    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
        $sub_menu = '<ul>
            ' . $sub_menu . '
            </ul>';
        $vars['output'] = '<li>' . l($element['#title'], $element['#href']) . $sub_menu . '</li>';
    }
    else {
        $vars['output'] = '<li>'.l($element['#title'], $element['#href']).'</li>';
    }
}

/**
 * Process variables for menu_tree__menu-menu-top.tpl.php.
 */
function school_theme_preprocess_menu_link__menu_menu_left(&$vars) {
  $element = $vars['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
    $sub_menu = '<ul>
            ' . $sub_menu . '
            </ul>';
    $vars['output'] = '<li>' . l($element['#title'], $element['#href']) . $sub_menu . '</li>';
  }
  else {
    $vars['output'] = '<li>'.l($element['#title'], $element['#href']).'</li>';
  }
}

/**
 * Process variables node--photo-slider-fool.tpl.php.
 */
function school_theme_preprocess_node__photo_slider_fool(&$vars) {
  $a = 1;
}

/**
 * Process variables for views-view-unformatted--photo-albums--main-slider.tpl.php.
 */
function school_preprocess_views_view_unformatted__photo_albums__main_slider(&$vars) {
  if (!empty($vars['view']->result[0]->field_field_photo)) {
    foreach ($vars['view']->result[0]->field_field_photo as $photo) {
      $vars['photos'][] = theme('image', array(
        'path' => $photo['raw']['uri'],
        'title' => $photo['raw']['title'],
      ));
    }
  }
  $a = 1;
}

/**
 * Process variables for comment.tpl.php
 */
function school_theme_preprocess_comment(&$vars) {
  $account = user_load($vars['comment']->uid);
  $node = $vars['node'];
  if ($vars['elements']['#comment']->uid == 0) {
    $vars['answer'] = 0;
  }
  else {
    $vars['answer'] = 1;
  }
  $vars['name'] = $vars['elements']['#comment']->name;
  $vars['comments'] = $vars['comment']->comment_body['und'][0]['safe_value'];
  $vars['date'] = gmdate("m-d-Y", $vars['comment']->created);

}

/**
 * Process variables for comment_wrapper.tpl.php
 */
function school_theme_preprocess_comment_wrapper(&$vars) {
  $vars['content']['comment_form']['comment_body']['und'][0]['#format'] = 'plain_text';
  $vars['content']['comment_form']['comment_body']['und']['#title'] = t('Вопрос');
  $vars['content']['comment_form']['comment_body']['und'][0]['value']['#title'] = t('Вопрос');
  unset($vars['content']['comment_form']['subject']);
  $vars['content']['comment_form']['actions']['submit']['#value'] = t('Отправить');
  unset($vars['content']['comment_form']['actions']['preview']);
}

/**
 * Process variables for comment-form.tpl.php
 */
function school_theme_preprocess_comment_form(&$vars) {
 $a = 1;
}