<div id="mosaicflow">
    <?php while(have_posts()): ?>
        <?php the_post(); ?>
        <div class="post">
            <article>
                <?php if(has_post_thumbnail()): ?>
                    <figure>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </figure>
                <?php endif; ?>
                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    <?php endwhile; ?>
</div>