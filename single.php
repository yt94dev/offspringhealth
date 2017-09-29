<?php get_header(); ?>

<?php get_template_part( 'index-top-section' ); ?>
<?php while ( have_posts() ) : the_post(); $acf_fields = get_field('post_data_fields'); ?>
<section class="post-section <?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name . ' '; 
  }
}
?>" id="print-section">
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
                <?php if($acf_fields['top_image_article']): ?>
                <div class="post-thumbnail-top">
                    <figure>
                        <img src="<?php echo trim($acf_fields['top_image_article']);?>" alt="">
                        <div class="date-share">
                            <span><?php  echo get_the_date("F j, Y");?></span>
                            <span class="icons-social-share-top">
                                <a href="<?php echo get_permalink($post->ID); ?>" data-image="<?php echo trim($acf_fields['top_image_article']);?>" data-title="<?php the_title(); ?>" data-desc="<?php echo get_the_excerpt(); ?>" class="fa fa-facebook fbBtnShare" aria-hidden="true"></a>
                                <?php if( get_field('pdf_file') ): ?>

                                    <a href="<?php the_field('pdf_file');?>" class="fa fa-file-pdf-o" aria-hidden="true"></a>

                                <?php endif; ?>
                                
                                <i class="fa fa-print"  aria-hidden="true"></i>
                                <a href="javascript:emailCurrentPage()" class="fa fa-envelope-o" aria-hidden="true"></a> 
                            </span>   
                        </div>
                    </figure>
                </div>
                <?php else :?>
                        <div class="date-share">
                            <span><?php  echo get_the_date("F j, Y");?></span>
                            <span class="icons-social-share-top">
                                <a href="<?php echo get_permalink($post->ID); ?>" data-image="<?php echo trim($acf_fields['top_image_article']);?>" data-title="<?php the_title(); ?>" data-desc="<?php echo get_the_excerpt(); ?>" class="fa fa-facebook fbBtnShare" aria-hidden="true"></a>
                                <?php if( get_field('pdf_file') ): ?>

                                    <a href="<?php the_field('pdf_file');?>" class="fa fa-file-pdf-o" aria-hidden="true"></a>

                                <?php endif; ?>
                                
                                <i class="fa fa-print" aria-hidden="true"></i>
                                <a href="javascript:emailCurrentPage()" class="fa fa-envelope-o" aria-hidden="true"></a> 
                            </span>   
                        </div>
                <?php endif;?>
                
                <h2 class="post-section-title"><?php the_title(); ?></h2>
            
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