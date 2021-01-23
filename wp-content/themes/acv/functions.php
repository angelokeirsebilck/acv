<?php

function acv_files()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swa');
    wp_enqueue_script('font-awesome', '//kit.fontawesome.com/6be973a3b4.js');
  
    //  Replace this later
    // wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', NULL, '1.0', true);

    if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
        wp_enqueue_script('main-acv-js', 'http://localhost:3000/bundled.js', null, '1.0', true);
    } else {
        wp_enqueue_script('our-vendors-js', get_theme_file_uri('/dist/vendors.341aaff10eca5c044d32.js'), null, '1.0', true);
        wp_enqueue_script('main-acv-js', get_theme_file_uri('/dist/scripts.47751ba73d490d40c779.js'), null, '1.0', true);
        wp_enqueue_style('our-main-styles', get_theme_file_uri('/dist/styles.47751ba73d490d40c779.css'));
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
     )
    );
}
add_action('init', 'acv_register_menus');

function theme_settings_page()
{
    ?>
<div class="wrap">
    <h1>Contact Info</h1>
    <p>Deze informatie word over gans de website gebruikt.</p>
    <form method="post" action="options.php">
        <?php
                    settings_fields("section");
    do_settings_sections("theme-options");
    submit_button(); ?>
    </form>
</div>

<?php
}

// Phone
function display_support_phone_element() { ?>

<input type="tel" name="support_phone" value="<?php echo get_option('support_phone'); ?>" size="35">
<?php }

// Fax
function display_support_fax_element() { ?>

<input type="tel" name="support_fax" value="<?php echo get_option('support_fax'); ?>" size="35">
<?php }

function display_custom_info_fields()
{
    add_settings_section("section", null, null, "theme-options");

    add_settings_field("support_phone", "Telefoon Nummer", "display_support_phone_element", "theme-options", "section");
    add_settings_field("support_fax", "Fax nummer", "display_support_fax_element", "theme-options", "section");

    register_setting("section", "support_phone");
    register_setting("section", "support_fax");
}

add_action("admin_init", "display_custom_info_fields");

function add_custom_info_menu_item()
{
    add_options_page("Contact Info", "Contact Info", "manage_options", "contact-info", "theme_settings_page");
}

add_action("admin_menu", "add_custom_info_menu_item");