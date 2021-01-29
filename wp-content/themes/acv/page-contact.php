<?php get_header(); ?>
<main class="Main">
    <div class="container">
        <div class="GoogleMaps-invisAddress invisible">
            <?php echo get_option('angelok_address') ?>
        </div>
        <div class="Contact">
            <h1 class="Contact-title"> <?php echo carbon_get_the_post_meta('angelok_contact_title'); ?></h1>

            <div class="Contact-info">
                <div class="Contact-item">
                    <div class="Contact-iconContainer">
                        <i class="fas fa-map-marker-alt Contact-icon"></i>
                    </div>

                    <a href="https://maps.google.com/?q=<?php echo get_option('angelok_address') ?>" target="_blank" class="Contact-link"><?php echo get_option('angelok_address') ?></a>
                </div>
                <div class="Contact-item">
                    <div class="Contact-iconContainer">
                        <i class="fas fa-envelope Contact-icon"></i>
                    </div>

                    <a href="mailto:<?php echo get_option('admin_email') ?>" class="Contact-link"><?php echo get_option('admin_email') ?></a>
                </div>
                <?php if (strlen(get_option('angelok_cellphone')) > 0) {?>
                <div class="Contact-item">
                    <div class="Contact-iconContainer">
                        <i class="fas fa-mobile-alt Contact-icon"></i>
                    </div>
                    <a href="tel:<?php echo get_option('angelok_cellphone') ?>" class="Contact-link"><?php echo get_option('angelok_cellphone') ?></a>
                </div>
                <?php } ?>
                <?php if (strlen(get_option('angelok_phone')) > 0) {?>
                <div class="Contact-item">
                    <div class="Contact-iconContainer">
                        <i class="fas fa-phone-alt Contact-icon"></i>
                    </div>
                    <a href="tel:<?php echo get_option('angelok_phone') ?>" class="Contact-link"><?php echo get_option('angelok_phone') ?></a>

                </div>
                <?php } ?>
                <?php if (strlen(get_option('angelok_fax')) > 0) {?>
                <div class="Contact-item">
                    <div class="Contact-iconContainer">
                        <i class="fas fa-fax Contact-icon"></i>
                    </div>
                    <div class="Contact-fax"><?php echo get_option('angelok_fax') ?>
                    </div>

                </div>
                <?php } ?>
            </div>
            <div class="Contact-hr"></div>
            <div class="Contact-intro">
                <?php echo carbon_get_the_post_meta('angelok_contact_intro'); ?>
            </div>
            <div class="Contact-form">
            <?php echo the_content(); ?>
            </div>
        </div>
    </div>
    
    <div class="GoogleMaps" id="GoogleMaps">

    </div>
</main>

<?php get_footer();
    