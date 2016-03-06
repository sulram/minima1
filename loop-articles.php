<div class="loop-articles">
<?php
    $cat = get_category(get_sub_field('category'));
    $args = array( 'posts_per_page' => -1, 'category' => $cat->term_id );
    $myposts = get_posts( $args );
    $date_format = get_sub_field('date_format');
    $cover = get_sub_field('cover');
?>
    <h2><?php echo $cat->name; ?></h2>
    <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <?php
        $redir = get_field('redirect_url');
        $post_url = $redir != '' ? $redir : get_the_permalink();
    ?>
    <article <?php post_class(); ?>>
        <a href="<?php echo $post_url; ?>">
        <?php if($cover): ?>
            <div class="post-cover">
                <?php the_post_thumbnail('square-small'); ?>
            </div>
        <?php elseif($date_format != ''): ?>
            <div class="post-date-col color-light"><?php echo get_the_date($date_format); ?></div>
        <?php endif; ?>
            <div class="post-content">
                <?php if($cover && $date_format != ''): ?>
                    <div class="post-date color-light"><?php echo get_the_date($date_format); ?></div>
                <?php endif; ?>
                <div><span class="post-title"><?php the_title(); ?></span></div>
                <div class="post-excerpt color-light"><?php echo $post->post_excerpt; ?></div>
            </div>
        </a>
    </article>
<?php
    endforeach;
    wp_reset_postdata();
?>
</div>