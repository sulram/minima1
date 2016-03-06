<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- <link rel="icon" href="<?php echo WP_THEME_URL ?>/img/favicon.ico" /> -->

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,200,200italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo WP_THEME_URL ?>/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WP_THEME_URL ?>/css/flexboxgrid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WP_THEME_URL ?>/css/minimal.css.php">

    <script>
        var PATH = "<?php echo WP_SITE_URL ?>";
        // TODO: WILL WE USE THIS ON BROWSERS THAT NOT SUPPORTS PUSH STATE???
        /*
        var LOC = String(window.location);
        if(LOC.replace(PATH,'').split('/')[1].length && LOC.indexOf('#') == -1){
            var url = PATH + "/#" + LOC.replace(PATH,'');
            if(url.slice(-1) === "/"){
                url = url.substring(0, url.length - 1);
            }
            window.location = url;
        }
        //*/
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- <section class="seo">

        <h1><?php wp_title(); ?></h1>

        <?php if(has_post_thumbnail()): ?>
            <figure>
                <?php the_post_thumbnail('full'); ?> 
            </figure>
        <?php else: ?>
            <img src="<?php echo WP_THEME_URL ?>/img/dobem-share-1.png"/>
        <?php endif; ?>
        
    </section> -->

    <header class="container">
        <h1 class="site-title"><a href="<?php echo site_url(); ?>"><?php bloginfo('title'); ?></a></h1>
        <nav class="site-menu">
            <?php
                wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
            ?>
        </nav>
    </header>

    <section class="container content">

