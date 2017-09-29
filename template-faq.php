<?php
/*
Template Name: FAQ template
*/

get_header(); ?>

<?php get_template_part( 'index-top-section' ); ?>

<section class="faq">
    <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="particle-container-post-1" data-jkit="[parallax:strength=0.4;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p1.png" alt=""></figure>
            </div>
            <div class="particle-container-post-2" data-jkit="[parallax:strength=0.2;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p2.png" alt=""></figure>
            </div>
            <div class="particle-container-post-3" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p3.png" alt=""></figure>
            </div>
            <div class="particle-container-post-4" data-jkit="[parallax:strength=0.4;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p4.png" alt=""></figure>
            </div>
            <div class="particle-container-post-5" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p5.png" alt=""></figure>
            </div>
            <div class="particle-container-post-6" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p6.png" alt=""></figure>
            </div>
            <div class="particle-container-post-7" data-jkit="[parallax:strength=0.4;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p7.png" alt=""></figure>
            </div>
            <div class="particle-container-post-8" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p8.png" alt=""></figure>
            </div>
            <div class="particle-container-post-9" data-jkit="[parallax:strength=0.3;axis=both]">
                <figure id="particle" ><img src="<?php bloginfo('template_url')?>/img/post-particles/p9.png" alt=""></figure>
            </div>
            <?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="faq-title"><?php the_title(); ?></h2>
            </div>
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="text-wrapper">
                    <?php the_content(); ?> 
                </div>
            </div>
            <?php  endwhile;  wp_reset_query();  ?>
        </div>  
    </div>
</section>

<?php get_template_part( 'appointment-contact' ); ?>

<?php get_footer(); ?>