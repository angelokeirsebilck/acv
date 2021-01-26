<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Add Content custom fields to certain pages
add_action('carbon_fields_register_fields', 'angelok_content_practice_area');
function angelok_content_practice_area()
{
    $praktijkgebeidenId = get_page_by_path('praktijkgebieden')->ID;

    Container::make('post_meta', 'Banner')
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_id', '=', $praktijkgebeidenId)
    ->add_fields(array(
        Field::make('complex', 'angelok_content_practice_areas',__('Praktijkgebieden'))->set_visible_in_rest_api( $visible = true )
        ->add_fields('angelok_content_practice_areas',__('Praktijkgebied'), array(
            Field::make('text', 'angelok_content_practice_area_name', __('Naam')),
            Field::make('textarea', 'angelok_content_practice_area_description', __('Beschrijving')),
        ))
    ));
}

// Add Content custom fields to certain pages
add_action('carbon_fields_register_fields', 'angelok_content');
function angelok_content()
{
    $kostenEnErelonenId = get_page_by_path('kosten-erelonen')->ID;

    Container::make('post_meta', 'Banner')
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_id', '=', $kostenEnErelonenId)
    ->add_fields(array(
        Field::make( 'rich_text', 'content_text', __( 'Tekst' ) )->set_required(true)
    ));
}

// Add Banner custom fields to certain pages
add_action('carbon_fields_register_fields', 'angelok_banner_image');
function angelok_banner_image()
{
    $praktijkgebeidenId = get_page_by_path('praktijkgebieden')->ID;
    $kostenEnErelonenId = get_page_by_path('kosten-erelonen')->ID;

    Container::make('post_meta', 'Banner')
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_id', '=', $praktijkgebeidenId)
    ->or_where( 'post_id', '=', $kostenEnErelonenId)
    ->add_fields(array(
        Field::make( 'image', 'banner_image', __( 'Afbeelding' ) )->set_required(true)
    ));
}

// Add Content Home custom fields to front page
add_action('carbon_fields_register_fields', 'angelok_content_home_group');
function angelok_content_home_group()
{
    Container::make('post_meta', 'Home Content')
    ->where('post_id', '=', get_option('page_on_front'))
    ->add_fields(array(
        Field::make('text', 'home_content_title', __('Titel'))
            ->set_required((true)),
        Field::make('rich_text', 'home_content_text', __('Tekst'))
        ->set_required((true)),
        Field::make( 'image', 'home_content_image', __( 'Afbeelding' ) )
    ));
}

// Add Home Banner custom fields to front page
add_action('carbon_fields_register_fields', 'angelok_homebanner_group');
function angelok_homebanner_group()
{
    Container::make('post_meta', 'Home Banner')
    ->where('post_id', '=', get_option('page_on_front'))
    ->add_fields(array(
        Field::make('textarea', 'homebanner_title', __('Titel'))
            ->set_required((true))
            ->set_help_text('Gebruik &lt;br&gt; in de tekst om tekst op de volgende regel te plaatsen.'),
        Field::make('media_gallery', 'homebanner_images', __('Afbeeldingen'))->set_required(true)->set_duplicates_allowed(false),
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

// Include custom routes
require get_theme_file_path('/inc/practice-area-route.php');


function acv_files()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swa');
    wp_enqueue_script('font-awesome', '//kit.fontawesome.com/6be973a3b4.js');

    if (is_page('Contact')) {
        wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCEFUT6eYl3dSYwnYZ1GmjsuAsXFpzYhUU', null, '1.0', false);
    }


    
    if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
        // Bug in webpack when you use multiple entry points so we need config.optimization: runtimeChunk: single
        // This runtime.js makes sure there is only one runtime so Hot Reload Module works.
        wp_enqueue_script('runtime-acv-js', 'http://localhost:3000/runtime.js', null, '1.0', true);
        wp_enqueue_script('main-acv-js', 'http://localhost:3000/scripts.js', null, '1.0', true);
        if (is_front_page()) {
            wp_enqueue_script('home-acv-js', 'http://localhost:3000/home.js', null, '1.0', true);
        }
        if (is_page(13)) {
            wp_enqueue_script('home-acv-js', 'http://localhost:3000/practiceArea.js', null, '1.0', true);
        }
        
    } else {
        if (is_front_page()) {
            wp_enqueue_script('home-js', get_theme_file_uri('/dist/home.1841d1211597d32d4fc6.js'), null, '1.0', true);
        }
        if (is_page(13)) {
            wp_enqueue_script('home-js', get_theme_file_uri('/dist/practiceArea.61780116bdf8efa1fafc.js'), null, '1.0', true);
        }
        wp_enqueue_script('our-vendors-js', get_theme_file_uri('/dist/vendors.63f1a2825a1a4259c198.js'), null, '1.0', true);
        wp_enqueue_script('main-acv-js', get_theme_file_uri('/dist/scripts.c02a96cd26b6e3d44537.js'), null, '1.0', true);
        wp_enqueue_style('our-main-styles', get_theme_file_uri('/dist/styles.c02a96cd26b6e3d44537.css'));
    }
}

add_action('wp_enqueue_scripts', 'acv_files');

function acv_features()
{
    add_theme_support('title-tag');
    add_image_size('homeBanner', 720, 500, true,'center');
    add_image_size('homeContent', 650, 500, true,'center');
    add_image_size('banner', 1200, 500, true,'center');
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