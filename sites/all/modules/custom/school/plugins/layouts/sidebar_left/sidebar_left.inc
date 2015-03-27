<?php
/**
 * @file
 * landing_user.inc
 * Definition of custom panels layout.
 *
 */

// Plugin definition
$plugin = array(
  'category' => t('School'),
  'title' => t('Top,left sidebar,main,bottom'),
  'icon' => 'sidebar_left.png',
  'theme' => 'sidebar-left',
  'regions' => array(
    'top' => t('Top'),    
    'content_left' => t('Content: left'),
    'content_main' => t('Content: main'),
    'bottom' => t('Bottom'),
  ),
);
