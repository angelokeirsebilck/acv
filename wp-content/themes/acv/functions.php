<?php

function acv_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swa');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  
  //  Replace this later
  // wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', NULL, '1.0', true);

  if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    wp_enqueue_script('main-acv-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
  } else {
    wp_enqueue_script('our-vendors-js', get_theme_file_uri('/dist/vendors.d6b45bb2b07fd1dcbc81.js'), NULL, '1.0', true);
    wp_enqueue_script('main-acv-js', get_theme_file_uri('/dist/scripts.124bf7d0d6d79bcb4d98.js'), NULL, '1.0', true);
    wp_enqueue_style('our-main-styles', get_theme_file_uri('/dist/styles.124bf7d0d6d79bcb4d98.css'));
  }
}

add_action('wp_enqueue_scripts', 'acv_files');

function acv_features(){
  add_theme_support('title-tag');
}

add_action('after_setup_theme','acv_features');