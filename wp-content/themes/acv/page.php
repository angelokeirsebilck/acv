<?php

  get_header();
?>
<main class="Main">
    <?php
    while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
</main>

<?php
  get_footer();