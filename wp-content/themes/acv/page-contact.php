<?php get_header(); ?>
<main class="Main">
    <div class="container">
        <?php
    while (have_posts()) {
        the_post();
        the_content();
    }
    
    ?>
        <h1 class="HomeBanner-title">Contact</h1>
    </div>
</main>

<?php get_footer();