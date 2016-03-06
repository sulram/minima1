<?php while(have_posts()): ?>
    <?php
        the_post();
        the_post_thumbnail('2x');
    ?>
<?php endwhile; ?>