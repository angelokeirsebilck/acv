<section class="Block Block--homeBanner">
    <div class="container">
        <div class="HomeBanner">
            <h1 class="HomeBanner-title"><?php echo carbon_get_the_post_meta('homebanner_title'); ?>
            </h1>
            <div class="HomeBanner-linksContainer">
                <?php
            $links = carbon_get_post_meta(get_the_ID(), 'homebanner_links');
            
            if ($links) {
                foreach ($links as $link) {
                    ?>
                <div class="HomeBanner-linkContainer">

                    <?php
                    if ($link['_type'] == 'custom_link') {
                        ?>
                    <a href="<?php echo $link['homebanner_custom_link_url'] ?>" class="Button Button--secondary"
                        target="_blank"><?php echo $link['homebanner_custom_link_tekst']?>
                        <img src="<?php echo get_theme_file_uri('/images/right-arrow-long.svg') ?>"
                            class="style-svg Button-icon" />
                    </a>
                </div>
                <?php
                    }

                    if ($link['_type'] == 'pagina_link') {
                        // print_r($link);
                        $pageId = $link['homebanner_pagina_link'][0]['id']; ?>
                <a href="<?php echo get_permalink($pageId) ?>"
                    class="Button Button--primary"><?php echo $link['homebanner_pagina_link_tekst'] ?><img
                        src="<?php echo get_theme_file_uri('/images/right-arrow-long.svg') ?>"
                        class="style-svg Button-icon" /></a>
            </div>
            <?php
                    }
                }
            }?>

        </div>

    </div>
    </div>
</section>