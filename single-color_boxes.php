<?php get_header(); ?>


<?php get_template_part( 'index-top-section' ); ?>

<section class="what-we-do-post" id="color-box">
            <div class="particle-container-wedo-post-1" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle"><img src="<?php bloginfo('template_url')?>/img/post-particles/p2.png" alt=""></figure>
            </div>
            <div class="particle-container-wedo-post-2" data-jkit="[parallax:strength=0.2;axis=both]">
                <figure id="particle"><img src="<?php bloginfo('template_url')?>/img/post-particles/p3.png" alt=""></figure>
            </div>
            <div class="particle-container-wedo-post-3" data-jkit="[parallax:strength=0.4;axis=both]">
                <figure id="particle"><img src="<?php bloginfo('template_url')?>/img/post-particles/p4.png" alt=""></figure>
            </div>
            
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                <div class="we-do-post-overlay">
                    <figure>
                        <?php the_post_thumbnail('full'); ?> 
                    </figure>
                    <div class="post-text-container">
                        <h2 class="we-do-title"><? the_title(); ?></h2>
                        <div class="text-container">
                            <?php the_content(); ?>
                            <a class="we-do-post-btn" href="#appointments">Book an appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile;?>  
    <div class="particle-container-wedo-post-4" data-jkit="[parallax:strength=0.1;axis=both]">
                <figure id="particle"><img src="<?php bloginfo('template_url')?>/img/post-particles/p5.png" alt=""></figure>
    </div>
</section>

<?php get_template_part( 'appointment-contact' ); ?>

<?php get_footer(); ?>