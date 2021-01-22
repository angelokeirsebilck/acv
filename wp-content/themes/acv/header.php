<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="Header">
        <div class="container">
            <div class="row">
                <div class="Header-container">
                    <div class="Logo Logo--header">
                    </div>
                    <div class="Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="Navigation-body">
                        <nav class="Nav Nav--main">
                            <?php
                                wp_nav_menu(array( 'theme_location' => 'header-menu' ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>