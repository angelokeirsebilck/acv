<section class="Block Block--homeBanner">
    <div class="HomeBanner">
        <div class="container px-4">
            <div class="HomeBanner-mouseScrollContainer">
                <div class="HomeBanner-mouseScrollDown"></div>
            </div>

            <div class="row gx-5">
                <div class="col-12 col-md-4 HomeBanner-textContent">
                    <h1 class="HomeBanner-title"><?php echo carbon_get_the_post_meta('homebanner_title'); ?>
                    </h1>
                    <div class="HomeBanner-linksContainer">
                        <?php
                            $links = carbon_get_post_meta(get_the_ID(), 'homebanner_links');
                            if ($links) {
                            foreach ($links as $link) {
                        ?>
                        <div class="HomeBanner-linkContainer">
                            <?php if ($link['_type'] == 'custom_link') { ?>
                            <a href="<?php echo $link['homebanner_custom_link_url'] ?>" class="Button Button--secondary" target="_blank"><?php echo $link['homebanner_custom_link_tekst']?>
                                <img src="<?php echo get_theme_file_uri('/images/right-arrow-long.svg') ?>" class="style-svg Button-icon" />
                            </a>
                        </div>
                        <?php
                        }
                        if ($link['_type'] == 'pagina_link') {
                        $pageId = $link['homebanner_pagina_link'][0]['id']; ?>

                        <a href="<?php echo get_permalink($pageId) ?>" class="Button Button--primary"><?php echo $link['homebanner_pagina_link_tekst'] ?>
                            <img src="<?php echo get_theme_file_uri('/images/right-arrow-long.svg') ?>" class="style-svg Button-icon" />
                        </a>
                    </div>
                    <?php
                            }
                        }
                    }?>
                </div>

            </div>
            <div class="col-12 col-md-8 HomeBanner-images">
                <div class="HomeBanner-sliderContainer">

                    <div class="HomeBanner-slider">
                        <div class="swiper-wrapper">
                            <?php 
                            $imageList = carbon_get_the_post_meta('homebanner_images');
                            foreach($imageList as $key=>$value){ ?>
                            <div class="swiper-slide">
                                <?php 
                                echo wp_get_attachment_image(carbon_get_the_post_meta('homebanner_images')[$key],'homeBanner',null,array(
                                        'class' => 'HomeBanner-image'
                                ));
                            ?>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>