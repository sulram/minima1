<?php while(have_posts()): ?>
    <?php
        the_post();
        $cat = get_the_category()[0];
        $page = get_field('redirect_page', $cat);
    ?>
    <div class="post">
        <article>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="post-content">
                        <h1 class="post-title"><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></h1>
                        
                        <?php the_content(); ?>
                        <br/>
                        <h3 class="color-light">
                            <?php if ($page): ?>
                                <a class="color-light" href="<?php echo $page; ?>" rel="redirect_page"><?php echo $cat->name; ?></a>
                            <?php else: ?>
                                <?php echo $cat->name; ?>
                            <?php endif; ?>    
                            <br/><?php echo get_the_date(); ?>
                        </h3>
                    </div>
                </div>
                <?php if(has_post_thumbnail()): ?>
                    <div class="col-xs-12 col-sm-5 col-sm-offset-1">
                        <figure>
                            <?php the_post_thumbnail(); ?>
                        </figure>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    </div>
<?php endwhile; ?>
