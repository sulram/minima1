<?php
/*
Template Name: Columns
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
                        get_template_part('loop','articles');
                    endwhile;
                endif;
            ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?php the_content(); ?>
            <?php
                if( have_rows('other_categories') ):
                    while ( have_rows('other_categories') ) : the_row();
                        get_template_part('loop','articles');
                    endwhile;
                endif;
            ?>
        </div>
    </div>


<?php endwhile; ?>