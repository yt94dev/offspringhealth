<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */

get_header(); ?>

<?php get_template_part( 'index-top-section' ); ?>

<section class="welcome-to">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="welcome-to-title welcome-to-title-1">
                    <?php the_field('welcome_to_section_title', 10) ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                <div class="welcome-to-article welcome-to-article-1">
                    <?php the_field('welcome_to_section_text', 10) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="particle-container2" data-jkit="[parallax:strength=0.3;axis=both]">
        <figure id="particle1" ><img src="<?php bloginfo('template_url')?>/img/particles/p1.png" alt=""></figure>
    </div>
    <div class="particle-container" data-jkit="[parallax:strength=0.1;axis=both]">
        <figure id="particle2" ><img src="<?php bloginfo('template_url')?>/img/particles/p2.png" alt=""></figure>
    </div>
    
    
</section>

<section class="what-we-do" id="we-do">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="welcome-to-title what-we-do-title what-we-do-title-1">
                    <?php the_field('what_we_do_title') ?>
                </h2>
                <div class="what-we-do-tab-btns">
                    <div class="tabs-btn speciality-tab-btn active-tab-btn">speciality</div>
                    <div class="tabs-btn clinics-tab-btn">clinics</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <?php  $color_boxes_categories = get_terms( array(
                'taxonomy' => 'color_boxes_cat',
                'order' => 'DESC',) ); ?>
                <div class="speciality-tab">
                    <?php $args = array(
                            'post_type' => 'color_boxes',
                            'posts_per_page' => 12,
                            'post_status' => 'publish',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'color_boxes_cat',
                                    'field'    => 'slug',
                                    'terms' => 'speciality'
                                ),
                            ),
                        );
                    
                        $boxes = new WP_Query( $args ); ?>
            
                        <?php while ( $boxes->have_posts() ) : $boxes->the_post();?>

                                <div class="icon-container">
                                    <a href="<? echo get_post_permalink(); ?>#color-box" class="outer-link">
                                    <figure>
                                        <?php the_post_thumbnail('full'); ?> 
                                    </figure>
                                    <p class="icon-caption"><? the_title(); ?></p>
                                    </a>
                                </div>

                        <?php endwhile; ?>
                            
                            
                    
                        <?php wp_reset_query(); ?>
                            
                     
                </div>
                <div class="clinics-tab">
                <?php $argsclinics = array(
                            'post_type' => 'color_boxes',
                            'posts_per_page' => 12,
                            'post_status' => 'publish',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'color_boxes_cat',
                                    'field'    => 'slug',
                                    'terms' => 'clinics'
                                ),
                            ),
                        );
                    
                        $boxes = new WP_Query( $argsclinics ); ?>
            
                        <?php while ( $boxes->have_posts() ) : $boxes->the_post();?>

                                <div class="icon-container">
                                <a href="<? echo get_post_permalink(); ?>#color-box" class="outer-link">
                                    <figure>
                                        <?php the_post_thumbnail('full'); ?> 
                                    </figure>
                                    <p class="icon-caption"><? the_title(); ?></p>
                                </a>
                                </div>

                        <?php endwhile; ?>
                            
                            
                    
                        <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-team" id="our-team">
    <div class="particle-container3" data-jkit="[parallax:strength=0.1;axis=both]">
        <figure id="particle3" ><img src="<?php bloginfo('template_url')?>/img/particles/p3.png" alt=""></figure>
    </div>
    <div class="particle-container4" data-jkit="[parallax:strength=0.3;axis=both]">
        <figure id="particle4" ><img src="<?php bloginfo('template_url')?>/img/particles/p4.png" alt=""></figure>
    </div>
    <div class="particle-container5" data-jkit="[parallax:strength=0.2;axis=both]">
        <figure id="particle5" ><img src="<?php bloginfo('template_url')?>/img/particles/p5.png" alt=""></figure>
    </div>
    <div class="particle-container6" data-jkit="[parallax:strength=0.5;axis=both]">
        <figure id="particle6" ><img src="<?php bloginfo('template_url')?>/img/particles/p6.png" alt=""></figure>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-3 col-sm-3 col-xs-3">
                <h2 class="welcome-to-title our-team-title">
                    <?php the_field('our_team_section_title') ?>
                </h2>
                <div class="our-team-btns-wrapper">
                    <div class="button-tab-team button-tab-team-active">Practitioners</div>
                    <div class="button-tab-team">Staff</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="owl-carousel-home owl-carousel owl-theme owl-container">
                    <div class="item">   
                        <?php
                        $args = array(
                            'post_type' => 'team_members',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'menu_order',
                            'order'=>'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'team_members_cat',
                                    'field'    => 'slug',
                                    'terms' => 'PRACTITIONERS'
                                ),
                            ),
                        );

                        
                        $loop = new WP_Query( $args );
                        ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); $acf_fields = get_field('additional_member_data_fields');?>
                                
                            <div class="our-team-item">
                                
                                    <figure>
                                    <a href="<? echo get_post_permalink(); ?>#team-card" class="outer-link"></a>
                                    <?php the_post_thumbnail('full'); ?> 
                                        <div class="team-member-overlay">
                                            <a href="<? echo get_post_permalink(); ?>#team-card" class="read-more-team">read more</a>
                                        </div>
                                    
                                    </figure>
                                
                                    <p class="our-team-item-descr">
                                        <span class="our-team-name"><? the_title(); ?></span>
                                        <span class="our-team-occup"><?php echo trim ($acf_fields['member_medical_profession']);?></span>
                                    </p>
                                
                            </div>

                        <?php endwhile; ?>
                            
                            
                    </div>
                    <div class="item hided">
                    <?php
                        $args = array(
                            'post_type' => 'team_members',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'menu_order',
                            'order'=>'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'team_members_cat',
                                    'field'    => 'slug',
                                    'terms' => 'STAFF'
                                ),
                            ),
                        );

                        
                        $loop = new WP_Query( $args );
                        ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); $acf_fields = get_field('additional_member_data_fields');?>
                                
                            <div class="our-team-item">
                                
                                    <figure>
                                    <a href="<? echo get_post_permalink(); ?>#team-card" class="outer-link"></a>
                                    <?php the_post_thumbnail('full'); ?> 
                                        <div class="team-member-overlay">
                                            <a href="<? echo get_post_permalink(); ?>#team-card" class="read-more-team">read more</a>
                                        </div>
                                    
                                    </figure>
                                
                                    <p class="our-team-item-descr">
                                        <span class="our-team-name"><? the_title(); ?></span>
                                        <span class="our-team-occup"><?php echo trim ($acf_fields['member_medical_profession']);?></span>
                                    </p>
                                
                            </div>

                        <?php endwhile; ?>
                            
                    </div>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="particle-container7" data-jkit="[parallax:strength=0.3;axis=both]">
        <figure id="particle7" ><img src="<?php bloginfo('template_url')?>/img/particles/p7.png" alt=""></figure>
    </div>
    <div class="particle-container8" data-jkit="[parallax:strength=0.3;axis=both]">
        <figure id="particle8" ><img src="<?php bloginfo('template_url')?>/img/particles/p8.png" alt=""></figure>
    </div>
</section>

<section class="offshoot" id="offshoot">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="offshoot-title"><?php the_field('offshoot_section_title') ?></h2>
            </div>
        </div>
        <div class="row">
        <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="offshoot-articles">
                    <figure>
                        <?php the_post_thumbnail( 'full' ); ?>
                    </figure>
                    <p class="offshoot-date"><?php  echo get_the_date("F j, Y");?></p>
                    <p class="offshoot-article"><?php the_title(); ?></p>
                    <p class="offshoot-text-summary"><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php the_permalink() ?>" class="offshoot-read-more">Read more</a>
                </div>
            </div>
            <?php  endwhile; wp_reset_postdata(); ?>
        </div>
        <a href="<?php the_field('offshoot_section_more_posts_link') ?>#blogposts-wrapper" class="offshoot-more-posts">more posts</a>
    </div>
</section>
<section class="our-philosophy" id="our-philosophy">
    <div class="particle-container9" data-jkit="[parallax:strength=0.05;axis=both]">
        <figure id="particle9" ><img src="<?php bloginfo('template_url')?>/img/particles/p9.png" alt=""></figure>
    </div>
    <div class="particle-container10" data-jkit="[parallax:strength=0.1;axis=both]">
        <figure id="particle10" ><img src="<?php bloginfo('template_url')?>/img/particles/p10.png" alt=""></figure>
    </div>
    <div class="particle-container11" data-jkit="[parallax:strength=0.2;axis=both]">
        <figure id="particle11" ><img src="<?php bloginfo('template_url')?>/img/particles/p11.png" alt=""></figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="welcome-to-title">
                    our <b>philosophy</b>
                </h2>
            </div>
        </div>
        <div class="row">
        <?php if( have_rows('our_philosophy_columns_content') ): ?>

            

            <?php while( have_rows('our_philosophy_columns_content') ): the_row(); 

                // vars
                $image = get_sub_field('column_top_image');
                $title = get_sub_field('column_title');
                $article = get_sub_field('column_article');

                ?>

            <div class="col-lg-4 col-sm-offset-1 col-md-4 col-md-offset-0 col-sm-10 col-xs-12">
                <div class="philosophy-article-wrapper">
                    <figure>
                        <img src="<?php echo $image; ?>" alt="">
                    </figure>
                    <p class="philosophy-title"><?php echo $title; ?></p>
                    <p class="philosophy-text"><?php echo $article; ?></p>
                </div>
            </div>

                   
                    

                

            <?php endwhile; ?>

            

        <?php endif; ?>
            
            
            
        </div>
    </div>
</section>

<?php get_template_part( 'appointment-contact' ); ?>

<?php get_footer(); ?>
