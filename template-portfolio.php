<?php
/*
Template Name: Portfolio
*/
?>
<?php while(have_posts()): ?>
    <?php
        the_post();
    ?>
    <h1 class="seo"><?php the_title(); ?></h1>
    <div class="row">
        <?php
            $cat = get_category(get_field('selected_category'));
            $args = array( 'posts_per_page' => -1, 'category' => $cat->term_id );
            $myposts = get_posts( $args );
            $date_format = get_field('date_format');
            $cover = get_field('cover');
            $len = count($myposts);
            $k = 0;
        ?>
            <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <?php
                $redir = get_field('redirect_url');
                $post_url = $redir != '' ? $redir : get_the_permalink();
            ?>
            <div class="col-xs-12 col-sm-6">
                <article <?php post_class(); ?>>
                    <a href="<?php echo $post_url; ?>">
                    <?php if($cover): ?>
                        <div class="post-cover">
                            <?php the_post_thumbnail('square-medium'); ?>
                        </div>
                    <?php elseif($date_format != ''): ?>
                        <div class="post-date-col color-light"><?php echo get_the_date($date_format); ?></div>
                    <?php endif; ?>
                        <div class="post-content.small">
                            <?php if($cover && $date_format != ''): ?>
                                <div class="post-date color-light"><?php echo get_the_date($date_format); ?></div>
                            <?php endif; ?>
                            <div><span class="post-title"><?php the_title(); ?></span></div>
                            <div class="post-excerpt color-light"><?php echo $post->post_excerpt; ?></div>
                        </div>
                    </a>
                </article>
            </div>
        <?php
                if($k == $len-1){
                    echo "</div>";
                }elseif($k % 2 == 1){
                    echo "</div><div class=\"row\">";
                }

                $k++;
            endforeach;
            wp_reset_postdata();
        ?>
    </div>


<?php endwhile; ?>