<?php get_header(); ?>


<?php get_template_part( 'index-top-section' ); ?>

<section class="single-member-card" id="team-card">
<?php while ( have_posts() ) : the_post(); $acf_fields = get_field('additional_member_data_fields');?>
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="member-wrapper-card">
            <div class="member-title" style="background-color:<?php echo trim($acf_fields['color_of_tab']);?>">
              <h2 class="member-name"><? the_title(); ?></h2>
              <p class="member-med-abbr"><?php echo trim($acf_fields['member_medical_abbreviation']);?></p>
              <p class="member-med-profession"><?php echo trim($acf_fields['member_medical_profession']);?></p>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="article-body-wrapper-member">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="avatar-section-wrapper">
                    <figure>
                            <img src="<?php echo trim($acf_fields['avatar_image']);?>" alt="">
                    </figure>
                    <?php if($acf_fields['clinical_interests']):?>
                    <div class="interests-wrapper-text">
                        <p class="prof-interests-title">clinical interests</p>
                        <p class="prof-interests">
                            <?php echo trim($acf_fields['clinical_interests']);?>
                        </p>
                    </div>
                    <?php endif;?>
                </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <?php if( $post->post_content != "" ):?>
            <h2 class="about-member-single">about</h2>
            <div class="text-wrapper">
                <?php the_content(); ?>
            </div>
            <?php endif;?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="#appointments" class="team-member-book">Book an appointment</a>
        </div>
      </div>
    </div>
    
  </div>
  <?php endwhile;?>
</section>

<?php get_template_part( 'appointment-contact' ); ?>

<?php get_footer(); ?>