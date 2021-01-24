<?php
/*

Plugin Name: Contact Information Page

Description: Adds a custom admin page for contact information

Version: 1.0.0

Author: Angelo K

Text Domain: angelok

*/

function angelok_contact_info()
{
    add_menu_page(
        __('Contact info', 'angelok'),
        __('Contact info', 'angelok'),
        'eigenaarwebsite',
        'contact-info',
        'angelok_contact_info_content',
        'dashicons-admin-generic',
        3
    );
}

add_action('admin_menu', 'angelok_contact_info');

function angelok_contact_info_content()
{
    ?>
<h1>
    Contact Informatie
</h1>
<p>Deze informatie word over gans de website gebruikt. (footer, contactpagina)</p>
<form method="post" action="options.php">
    <?php
    settings_fields("contact_info_setting_section");
    do_settings_sections("contact-info");
    submit_button(); ?>
</form>
<?php
}

function load_custom_wp_admin_style($hook)
{
    // Load only on ?page=mypluginname
    if ($hook != 'toplevel_page_contact-info') {
        return;
    }
    wp_enqueue_style(
        'mains',
        plugins_url('css/main.css', __FILE__)
    );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

// Phone
function display_angelok_address_element() { ?>

<input type="text" name="angelok_address" value="<?php echo get_option('angelok_address'); ?>" size="35">
<?php }

// Phone
function display_angelok_phone_element() { ?>

<input type="tel" name="angelok_phone" value="<?php echo get_option('angelok_phone'); ?>" size="35">
<?php }

// Fax
function display_angelok_fax_element() { ?>

<input type="tel" name="angelok_fax" value="<?php echo get_option('angelok_fax'); ?>" size="35">
<?php }

add_action('admin_init', 'my_settings_init');

function my_settings_init()
{
    add_settings_section(
        'contact_info_setting_section',
        null,
        null,
        'contact-info'
    );

    add_settings_field("angelok_address", "Adres", "display_angelok_address_element", "contact-info", "contact_info_setting_section");
    add_settings_field("angelok_phone", "Telefoon Nummer", "display_angelok_phone_element", "contact-info", "contact_info_setting_section");
    add_settings_field("angelok_fax", "Fax nummer", "display_angelok_fax_element", "contact-info", "contact_info_setting_section");

    register_setting("contact_info_setting_section", "angelok_address");
    register_setting("contact_info_setting_section", "angelok_phone");
    register_setting("contact_info_setting_section", "angelok_fax");
}