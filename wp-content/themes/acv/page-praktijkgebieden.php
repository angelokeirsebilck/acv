<?php get_header(); ?>
<main class="Main">
<?php get_template_part('template-parts/banner') ?>
    <div class="container px-4">
    
        <?php the_content();
        ?>
    </div>
</main>

<?php get_footer();