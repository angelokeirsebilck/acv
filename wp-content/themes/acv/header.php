<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php
    if (is_page(9)) {
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
          }
           
          if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
          }
    }
?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <h1 class="invisible"><?php echo get_option('blogname') ?>
    </h1>
    <div class="Wrapper">
        <header class="Header">
            <h1 class="invisible">Header </h1>
            <div class="container px-4">
                <div class="Header-container">
                    <div class="Logo Logo--header">
                    </div>
                    <div class="Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="Navigation-body" style="top: -100%">
                        <nav class="Nav Nav--main">
                            <h2 class="invisible">Main Nav</h2>
                            <?php
                                wp_nav_menu(array( 'theme_location' => 'header-menu' ));
                            ?>
                        </nav>
                    </div>
                </div>

            </div>
        </header>