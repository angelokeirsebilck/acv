<footer class="Footer">
    <h1 class="invisible">Footer</h1>
    <div class="Footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h2 class="Footer-subTitle">
                        Contact
                    </h2>
                    <div class="Footer-content">
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-map-marker-alt Footer-icon"></i>
                            </div>

                            <a href="https://maps.google.com/?q=Herenweg 21 8300 Knokke-Heist (Westkapelle) België"
                                class="Footer-link">Herenweg 21 8300 Knokke-Heist (Westkapelle) België</a>
                        </div>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-envelope Footer-icon"></i>
                            </div>

                            <a href="mailto:<?php echo get_option('admin_email') ?>"
                                class="Footer-link"><?php echo get_option('admin_email') ?></a>
                        </div>
                        <?php if (strlen(get_option('angelok_phone')) > 0) {?>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-phone-alt Footer-icon"></i>
                            </div>
                            <a href="tel:<?php echo get_option('angelok_phone') ?>"
                                class="Footer-link"><?php echo get_option('angelok_phone') ?></a>
                        </div>
                        <?php } ?>
                        <?php if (strlen(get_option('angelok_fax')) > 0) {?>
                        <div class="Footer-item">
                            <div class="Footer-iconContainer">
                                <i class="fas fa-fax Footer-icon"></i>
                            </div>
                            <div class="Footer-fax"><?php echo get_option('angelok_fax') ?>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6 Footer-menu">
                    <h2 class="Footer-subTitle">
                        Menu
                    </h2>
                    <div class="Footer-menuContainer">
                        <nav class="Nav--footer">
                            <h1 class='invisible'>Footer Nav</h1>
                            <?php wp_nav_menu(array( 'theme_location' => 'footer-menu' )); ?>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Footer-bottom">
    </div>
</footer>
</div class="Wrapper">
<?php wp_footer(); ?>
</body>


</html>