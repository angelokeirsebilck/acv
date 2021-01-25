<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Add Home Banner custom fields to front page
add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('post_meta', 'Home Banner')
    ->where('post_id', '=', get_option('page_on_front'))
    ->add_fields(array(
        Field::make('textarea', 'homebanner_title', __('Title'))
            ->set_required((true))
            ->set_help_text('Gebruik &lt;br&gt; in de tekst om tekst op de volgende regel te plaatsen.'),
        Field::make('media_gallery', 'homebanner_images', __('Afbeeldingen'))->set_required(true),
        Field::make('complex', 'homebanner_links')
            ->add_fields('pagina_link', array(
                Field::make('text', 'homebanner_pagina_link_tekst'),
                Field::make('association', 'homebanner_pagina_link')->set_types(array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'page',
                    )
                ))->set_max(1),

            ))

            ->add_fields('custom_link', array(
                Field::make('text', 'homebanner_custom_link_tekst'),
                Field::make('text', 'homebanner_custom_link_url'),
            ))->set_max(2)
    ));
}

// Load Carbon Fields
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


function acv_files()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swa');
    wp_enqueue_script('font-awesome', '//kit.fontawesome.com/6be973a3b4.js');

    if (is_page('Contact')) {
        wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCEFUT6eYl3dSYwnYZ1GmjsuAsXFpzYhUU', null, '1.0', false);
    }
    
    if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
        wp_enqueue_script('main-acv-js', 'http://localhost:3000/bundled.js', null, '1.0', true);
    } else {
        wp_enqueue_script('our-vendors-js', get_theme_file_uri('/dist/vendors.341aaff10eca5c044d32.js'), null, '1.0', true);
        wp_enqueue_script('main-acv-js', get_theme_file_uri('/dist/scripts.1bfdddad0dd94d498b42.js'), null, '1.0', true);
        wp_enqueue_style('our-main-styles', get_theme_file_uri('/dist/styles.1bfdddad0dd94d498b42.css'));
    }
}

add_action('wp_enqueue_scripts', 'acv_files');

function acv_features()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'acv_features');

function acv_register_menus()
{
    register_nav_menus(
        array(
      'header-menu' => __('Header Menu'),
      'footer-menu' => __('Footer Menu')
     )
    );
}
add_action('init', 'acv_register_menus');


// Fix bug where interface-skeleton is blocking meta boxes on edit screens
// add_action('admin_head', function () {
//     echo '<style>
//             .interface-interface-skeleton { display: block; }
//           </style>';
// });