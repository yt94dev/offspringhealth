<section class="appointments" id="appointments">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="appointments-title"><?php the_field('appointments_section_title', 10) ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="appointments-buttons-wrapper">
                <span class="appointments-button tab1-appointment appointment-btn-active">Make a referral</span>
                <span class="appointments-button tab2-appointment">request an Appointment</span>
            </div>
            <div class="appointment-tabs-wrapper">
                <div class="appointment-tab tab-referal appointment-tab-active"><?php the_field('make_a_referral_form', 10); ?></div>
                <div class="appointment-tab tab-book"> <?php the_field('book_an_appointment_form', 10); ?></div>
            </div>
        </div>
    </div>
</div>

</section>

<section class="contact-us">
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <h2 class="contact-us-title">
                <?php the_field('contact_us_section_title', 10) ?>
            </h2>

            <div class="contact-us-tabs-wrapper">
                <?php $f = 0; if( have_rows('map_addresses_cards', 10) ): ?>

                <?php  function addActiveClass($rowNum){
                    if($rowNum == 0){
                        $activeClass = 'contact-us-tab-active';
                        return $activeClass;
                    }
                } ?>

                <?php while( have_rows('map_addresses_cards', 10) ): the_row(); 

                    // vars
                    $city = get_sub_field('city_name');
                    $address = get_sub_field('address_text');
                    $parkingPrompt = get_sub_field('car_parking_text_prompt');
                    $publicPrompt = get_sub_field('public_transport_text_prompt'); ?>

                    <div class="contact-us-tab <?php echo addActiveClass($f); ?>">
                        <p class="place-title"><?php echo $city; ?></p>
                        <p class="place-address"><?php echo $address; ?></p>
                        <p class="place-car">Car Parking</p>
                        <p class="place-car-notification">
                            <?php echo $parkingPrompt; ?>
                        </p>
                        <p class="place-public-transport">Public Transport</p>
                        <p class="place-public-notification">
                            <?php echo $publicPrompt; ?>
                        </p>
                        <span class="place-show-map">show map</span>
                        <?php $f++; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="contact-us-maps-wrapper">
                <div class="contact-us-map contact-us-map-active">
                    <?php the_field('hawthorn_map', 10); ?>
                </div>
                <div class="contact-us-map">
                    <?php the_field('brighton_map', 10); ?>
                </div>
                <div class="contact-us-map">
                    <?php the_field('tasmania_map', 10); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="social-address-wrapper" id="contacts">
        <div class="addres-col-wrapper">
            <div class="social-col1">
                <p class="address-data"><?php the_field('telephone', 10); ?></p>
                <p class="address-data"><?php the_field('fax', 10); ?></p>
                <p class="address-data"><?php the_field('email', 10); ?></p>
            </div>
            <div class="social-col2">
                <p class="address-data">
                    <?php the_field('working_days', 10); ?>
                </p>
            </div>
        </div>
        <div class="icons-wrapper">
            <a href="<?php the_field('insta_link', 10); ?>" class="social-insta"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="<?php the_field('facebook_link', 10); ?>" class="social-fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="mailto:<?php the_field('mail_to_email', 10); ?>" class="social-mail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
        </div>
        <p class="social-acn"><?php the_field('acn', 10); ?></p>
    </div>
</div>
</section>