<?php
/*
Template Name: Profile
*/
?>
<?php while(have_posts()): ?>
    <?php
        the_post();
    ?>
    <h1 class="seo"><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <?php
                if( have_rows('selected_categories') ):
                    while ( have_rows('selected_categories') ) : the_row();
                        $cat = get_category(get_sub_field('category'));
                        $args = array( 'posts_per_page' => -1, 'category' => $cat->term_id );
                        $myposts = get_posts( $args );
                        $date_format = get_sub_field('date_format');
            ?>
                    <h2><?php echo $cat->name; ?></h2>
                    <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    <article <?php post_class(); ?>>
                        <div class="post-cover"></div>
                        <div class="post-content">
                            <?php if($date_format != ''): ?>
                                <div class="post-date color-light"><?php echo get_the_date($date_format); ?></div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="post-excerpt color-light"><?php echo $post->post_excerpt; ?></div>
                        </div>
                    </article>
                    <?php endforeach; wp_reset_postdata(); ?>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <h2>Info</h2>
            <div class="profile">
                <div class="profile-img">
                    <?php the_post_thumbnail('square-medium'); ?>
                </div>
                <div class="profile-text">
                <?php
                    if( have_rows('profile_links') ):
                        while ( have_rows('profile_links') ) : the_row();
                            echo "<div class=\"profile-link\">";
                            the_sub_field('html_code');
                            echo "</div>";
                        endwhile;
                    endif;
                ?>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
    </div>


<?php endwhile; ?>