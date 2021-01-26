<section class="Block Block--who">
    <div class="Who">
        <div class="container px-4">
            <div class="row gx-5">
                <div class="col-12 col-md-6 Who-imageContainer">
                    <?php 
                    echo wp_get_attachment_image(carbon_get_the_post_meta('home_content_image'),'homeContent',null,array(
                                'class' => 'Who-image responsive-image'
                        ));
                    ?>
                </div>
                <div class="col-12 col-md-6 Who-textContainer">
                    <h1 class="Who-title"><?php echo carbon_get_the_post_meta('home_content_title'); ?></h1>
                    <div class="Who-text">
                        <?php echo apply_filters( 'the_content', carbon_get_the_post_meta( 'home_content_text' ) ); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>