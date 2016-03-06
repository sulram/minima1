<div id="mosaicflow">
    <?php while(have_posts()): ?>
        <?php
            the_post();
            $cats = get_the_category();
            //print_r($cats);
            $post_classes = has_post_thumbnail() ? 'poster-image' : 'poster-text';
        ?>
        <div class="item">
            <article class="<?php echo $post_classes; ?>">
                <a href="<?php the_permalink(); ?>">

                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('2x'); ?>
                    <?php endif; ?>

                    <span class="post-category">
                        <?php echo $cats[0]->name; ?>
                    </span>

                    <h3 class="post-title link">
                        <?php the_title(); ?>
                    </h3>

                </a>

            </article>
        </div>
    <?php endwhile; ?>
</div>