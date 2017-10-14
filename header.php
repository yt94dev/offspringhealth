<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title><?php bloginfo('name')?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/style.min.css" type="text/css" media="screen">

    <?php if ( is_singular( 'post' )  ) : ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/print.css" type="text/css" media="print">
        <meta property="og:url"           content="<?php echo esc_url( get_permalink( ) ); ?>" />
        <meta property="og:type"          content="OFFSPRINGHEALTH.COM.AU" />
        <meta property="og:title"         content="Offspringhealth.<?php the_title(); ?>" />
        <meta property="og:description"   content="<?php global $post; echo get_the_excerpt($post->ID);?>" />
        <meta property="og:image"         content="<?php the_post_thumbnail_url( 'full' ); ?> />
        
    <?php endif; ?>

    <link rel="icon" href="<?php bloginfo('template_url')?>/favicons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url')?>/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url')?>/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url')?>/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url')?>/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url')?>/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url')?>/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url')?>/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url')?>/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url')?>/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url')?>/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url')?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url')?>/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url')?>/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url')?>/favicons/manifest.json"></noscript>
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url')?>/favicons/ms-icon-144x144.png">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
            <div class="container">
                <nav class="header-nav">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php bloginfo('template_url')?>/img/logo.svg" alt="Our logo!">
                        </a>
                    </div>
                    <!-- /.logo -->
                    <div class="navigation-wp">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                    </div>
                    <!-- /.navigation -->
                    <div class="hamburger-open"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
                </nav>
                <!-- /.header-nav -->
            </div>
    </header>
    <div class="wrapper">
        <div class="menu-overlay"></div>
    </div>
    <!-- /.wrapper -->

