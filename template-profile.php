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
            <h2>Entrevistas</h2>
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