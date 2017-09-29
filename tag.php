<?php
/*
Template Name: Blog posts list template
*/

get_header(); ?>

<?php get_template_part( 'index-top-section' ); ?>

<section class="blog-posts-section" id="blogposts-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="welcome-to-title blog-posts-title">
                    Search results for tag: <b> <?php single_tag_title(); ?> </b>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post(); ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                <div class="pagination">
                    <?php the_posts_pagination( ); ?> 
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <form class="form-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-append">
                        <input type="text" class="span2" placeholder="Search posts" value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>

                <div class="tag-cloud">
                    <h2 class="tag-cloud-title">
                        tag cloud
                    </h2>
                    <div class="tagcloud">
                        <?php wp_tag_cloud( array(
                            'smallest'                  => 10,
                            'largest'                   => 22,
                            'unit'                      => 'pt',
                            'number'                    => 15,
                            'format'                    => 'flat',
                            'separator'                 => "\n",
                            'orderby'                   => 'name',
                            'order'                     => 'ASC',
                            'exclude'                   => null,
                            'include'                   => null,
                            'topic_count_text_callback' => 'default_topic_count_text',
                            'link'                      => 'view',
                            'taxonomy'                  => 'post_tag',
                            'echo'                      => true,
                        ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'appointment-contact' ); ?>

<?php get_footer(); ?>