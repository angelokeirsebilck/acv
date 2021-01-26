<?php get_header(); ?>
<main class="Main">
    <div class="container px-4">
        <?php get_template_part('template-parts/banner.php') ?>
        <h1>Praktijkgebieden</h1>
        <?php the_content();
        ?>
    </div>
</main>

<?php get_footer();
