<h1 class="invisible"> Main</h1>
<section class="Banner">
    <?php 
        echo wp_get_attachment_image(carbon_get_the_post_meta('banner_image'),'banner',null,array(
                    'class' => 'Banner-image'
            ));
        ?>
    <div class="Banner-titleContainer">
        <h1 class="Banner-title"> <?php echo get_the_title() ?></h1>
    </div>
</section>