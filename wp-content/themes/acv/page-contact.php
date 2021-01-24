<?php get_header(); ?>
<main class="Main">
    <div class="container">
        <h1 class="HomeBanner-title">Contact</h1>
        <div class="GoogleMaps-invisAddress invisible">
            <?php echo get_option('angelok_address') ?>
        </div>
        <div class="GoogleMaps" id="GoogleMaps">

        </div>
    </div>
</main>

<?php get_footer();
