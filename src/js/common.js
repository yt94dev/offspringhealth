// Clicktype depending on device screen type
var clickEvent = (function() {
    if ('ontouchstart' in document.documentElement === true)
      return 'touchstart';
    else
      return 'click';
})();

jQuery.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            jQuery(this).removeClass('animated ' + animationName);
        });
        return this;
    }
});


// Print button
jQuery('.fa-print').on('click', function(){
    
    if ( jQuery( "#print-section .post-thumbnail-top" ).length ) {
        
        jQuery('#print-section img, .post-section-title, .text-wrapper').printThis();
        
    }else{
        jQuery('.post-section-title, .text-wrapper').printThis();
    }
    
});

// Email button
function emailCurrentPage(){
    window.location.href="mailto:?subject="+"Hey! I want to share you this page! "+document.title+"&body="+"Here is the link to a page!  "+escape(window.location.href)+"   Please check it out!";
}

// Document onload events
jQuery(document).ready(function () {
    if (jQuery("#blogposts-wrapper").hasClass("blog-posts-section")) {
        
        jQuery(".blog-posts-title").html(function(){
            var text= jQuery(this).text().trim().split(" ");
            var first = text.shift();
            return (text.length > 0 ? "<span style=\"font-weight:700;\">"+ first + "</span> " : first) + text.join(" ");
        });
    }
    



// Facebook SDK
// jQuery.ajaxSetup({ cache: true });
// jQuery.getScript('//connect.facebook.net/en_US/sdk.js', function(){
//   FB.init({
//     appId: '{your-app-id}',
//     version: 'v2.7' // or v2.1, v2.2, v2.3, ...
//   });     
//   jQuery('#loginbutton,#feedbutton').removeAttr('disabled');
//   FB.getLoginStatus(updateStatusCallback);
// });

// jQuery('.fbBtnShare').click(function(){
//     elem = jQuery(this);
//     postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

//     return false;
// });

// Smooth scroll to anchor
// jQuery('a[href^="#"]').click(function(){
//     var el = jQuery(this).attr('href');
//     if(window.location.hash = "#we-do") { 
//         jQuery('body').animate({
//         scrollTop: jQuery(el).offset().top}, 700);
//     }
    
//     return false;
// });



// Init particles system
jQuery('body').jKit();
  
    
if(jQuery(".what-we-do").length > 0)
    
    // What we do section buttons switching code
    jQuery(".tabs-btn").on(clickEvent, function(){
        if (!jQuery(this).hasClass("active-tab-btn")) {
            jQuery(".what-we-do-tab-btns").find("div.active-tab-btn").removeClass("active-tab-btn");
            jQuery(this).addClass("active-tab-btn");
        } else {
            jQuery(".what-we-do-tab-btns").find("div.active-tab-btn").removeClass("active-tab-btn");
            jQuery(this).addClass("active-tab-btn");
        }

        // What we do section tabs switching code

        if(jQuery(".speciality-tab-btn").hasClass("active-tab-btn")){
            
            jQuery(".what-we-do").find("div.animated").removeClass("animated slideInRight slideInLeft");
            jQuery(".clinics-tab").slideToggle();
            
                jQuery(".speciality-tab").slideToggle();

        } else if(jQuery(".clinics-tab-btn").hasClass("active-tab-btn")){
            
                jQuery(".what-we-do").find("div.animated").removeClass("animated slideInRight slideInLeft");
                jQuery(".speciality-tab").slideToggle();
                
                    jQuery(".clinics-tab").slideToggle();
                
        }
    });

    // jQuery(".our-team-item").on('click', function(){
    //     if (!jQuery(this).hasClass("our-team-item-active")) {
    //         // jQuery(".owl-carousel-home").find("div.our-team-item-active").removeClass("our-team-item-active");
    //         jQuery(".owl-carousel-home").find("div.our-team-item-active").animateCss('flipOutY');;
    //         var $activeCards = jQuery(".owl-carousel-home").find("div.our-team-item-active");
    //         setTimeout(function() {
    //             $activeCards.removeClass("our-team-item-active");
    //         }, 650); 

    //         jQuery(this).animateCss('flipInX').delay( 400 ).addClass("our-team-item-active");
    //     } else {
            
    //         jQuery(this).animateCss('flipOutY');
                
    //         setTimeout(function(){
    //             jQuery("div.our-team-item-active").removeClass("our-team-item-active").animateCss('flipOutY');
    //         },500);
            
    //     }
    // })



    jQuery(".appointments-button").on(clickEvent, function(){
        if(!jQuery(this).hasClass("appointment-btn-active")){
            jQuery(this).nextAll().removeClass("appointment-btn-active");
            jQuery(this).prevAll().removeClass("appointment-btn-active");
            jQuery(this).addClass("appointment-btn-active");
        }

        if (jQuery(".tab1-appointment").hasClass("appointment-btn-active")) {
            jQuery(".tab-book").removeClass("appointment-tab-active");
            jQuery(".tab-referal").addClass("appointment-tab-active");
        } else {
            jQuery(".tab-referal").removeClass("appointment-tab-active");
            jQuery(".tab-book").addClass("appointment-tab-active");
        }
    });


    jQuery(".place-show-map").on(clickEvent, function(){
        jQuery(this).parent(".contact-us-tab").siblings(".contact-us-tab-active").animateCss('zoomOutLeft');

        var $activeTabs = jQuery(this).parent(".contact-us-tab").siblings(".contact-us-tab-active");
        setTimeout(function() {
            $activeTabs.removeClass("contact-us-tab-active");
        }, 650);  
        jQuery(this).parent(".contact-us-tab").animateCss('flipInX').delay( 400 ).addClass("contact-us-tab-active");
        
        var indexTab = jQuery(".place-show-map").index(this);

        
        jQuery(".contact-us-map").eq(indexTab).animateCss('fageIn').addClass("contact-us-map-active");
        jQuery(".contact-us-map").eq(indexTab).nextAll().animateCss('fageOut').removeClass("contact-us-map-active");
        jQuery(".contact-us-map").eq(indexTab).prevAll().animateCss('fageOut').removeClass("contact-us-map-active");

        // resize map when its active(miltiple google maps issue)
        var indexTab = jQuery( ".place-show-map" ).index( this );
        var indexNumber = indexTab + 1;
        jQuery("#map" + indexNumber).data('wpgmp_maps').resize_map();
    });

    jQuery(".place-car").mouseover(function(){
        jQuery(this).siblings(".place-car-notification").fadeIn();
    });

    jQuery(".place-car").mouseout(function(){
        jQuery(this).siblings(".place-car-notification").fadeOut();
    });

    jQuery(".place-public-transport").mouseover(function(){
        jQuery(this).siblings(".place-public-notification").fadeIn();
    });

    jQuery(".place-public-transport").mouseout(function(){
        jQuery(this).siblings(".place-public-notification").fadeOut();
    });


    // When in viewport - ANIMATE 
    if (jQuery(window).width() >= 768) {
        
        

        jQuery( '.faq-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.avatar-section-wrapper' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated pulse");
            },
            hidden: function() {
                jQuery(this).removeClass("animated pulse");
            }
        });

        jQuery( '.member-name' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.welcome-to-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.welcome-text' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.contact-us-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.offshoot-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.appointments-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.post-section-title' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.welcome-to-title-1' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });
    
        jQuery( '.welcome-to-article-1' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInRight");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInRight");
            }
        });

        jQuery( '.what-we-do-title-1' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated slideInLeft");
            },
            hidden: function() {
                jQuery(this).removeClass("animated slideInLeft");
            }
        });

        jQuery( '.what-we-do-tab-btns' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated zoomIn");
            },
            hidden: function() {
                jQuery(this).removeClass("animated zoomIn");
            }
        });
    };

    jQuery( '.our-team-title' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated slideInLeft");
        },
        hidden: function() {
            jQuery(this).removeClass("animated slideInLeft");
        }
    });

    jQuery( '.our-team-article' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated bounceInLeft");
        },
        hidden: function() {
            jQuery(this).removeClass("animated bounceInLeft");
        }
    });

    jQuery( '.our-team-item-active' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated fadeInRight");
        },
        hidden: function() {
            jQuery(this).removeClass("animated fadeInRight");
        }
    });

    jQuery( '.offshoot-articles' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated fadeIn");
        },
        hidden: function() {
            jQuery(this).removeClass("animated fadeIn");
        }
    });

    if (jQuery(window).width() >= 992) {
        jQuery( '.philosophy-article-wrapper' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated flipInY");
            },
            hidden: function() {
                jQuery(this).removeClass("animated flipInY");
            }
        });
    }else{
        jQuery( '.philosophy-article-wrapper' ).onScreen({
            visible: function() {
                jQuery(this).addClass("animated fadeIn");
            },
            hidden: function() {
                jQuery(this).removeClass("animated fadeIn");
            }
        });
    }
        
    jQuery( '.owl-container' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated fadeIn");
        },
        hidden: function() {
            jQuery(this).removeClass("animated flipInY");
        }
    });

    jQuery( '.social-address-wrapper' ).onScreen({
        visible: function() {
            jQuery(this).addClass("animated fadeInLeft");
        },
        hidden: function() {
            jQuery(this).removeClass("animated fadeInLeft");
        }
    });

    jQuery( '.appointments' ).onScreen({
        visible: function() {
            jQuery('.our-philosophy').addClass("our-philosophy-ride");
        },
        hidden: function() {
            jQuery('.our-philosophy').removeClass("our-philosophy-ride");
        }
    });

    jQuery( 'footer' ).onScreen({
        visible: function() {
            jQuery(this).addClass("footer-ride");
        },
        hidden: function() {
            jQuery(this).removeClass("footer-ride");
        }
    });
     
    // Contact form 7 hooks
    jQuery('.wpcf7-form label').each( function() {
        
        jQuery(this).html( jQuery(this).html().replace('*','<span style="color:red;">*</span>') );
        
    } );
    jQuery('.heard-from-list').prepend('<option selected="selected" disabled="disabled" value="">Please select</option>');
    
    
    //Tabs switcher "OUR TEAM" section
    jQuery('.button-tab-team').on(clickEvent, function(){
        if(!jQuery(this).hasClass('button-tab-team-active')){
            jQuery('.button-tab-team').removeClass('button-tab-team-active');
            jQuery(this).addClass('button-tab-team-active');
            var ind = jQuery('.our-team-btns-wrapper').children('.button-tab-team-active').index();
            switch (ind) {
                case 0:
                    jQuery('.owl-carousel-home').children('.item').removeClass('invisible-tab hided hidedHeight show-faded-in');
                    jQuery('.owl-carousel-home').children('.item').eq(1).addClass('invisible-tab').hide();
                    jQuery('.owl-carousel-home').children('.item').eq(0).show().addClass('show-faded-in');
                    
                    
                    
                    
                    
                    
                    break;
                
                case 1:
                    jQuery('.owl-carousel-home').children('.item').removeClass('invisible-tab hided hidedHeight show-faded-in');
                    jQuery('.owl-carousel-home').children('.item').eq(0).addClass('invisible-tab').hide();
                    jQuery('.owl-carousel-home').children('.item').eq(1).show().addClass('show-faded-in');
                    
                    
                    
                    
                    break;
            
                default:
                    break;
            }


        }
    });


    // button-tab-team

    // button-tab-team-active
            
    
    

    // hamburger menu
    jQuery('.hamburger-open').on(clickEvent, function () {
        var menuOpenState = jQuery('.navigation-wp').css('display');
        if (menuOpenState == 'none') {
            jQuery('header').css('background', 'white');
            jQuery('.hamburger-open > .fa').addClass('fa-times-thin');
            jQuery('.hamburger-open > .fa').removeClass('fa-bars');
            jQuery('.navigation-wp').slideDown();
            jQuery('.menu-overlay').show();
        

                jQuery('.menu-overlay').addClass('overlay-active');
            

            jQuery('body').css('overflow-y', 'hidden');

        }
        else if (menuOpenState == 'block') {
            jQuery('.navigation-wp').slideUp();
                
            jQuery('body').css('overflow-y', 'initial');
            
            

            jQuery('.menu-overlay').hide();
            jQuery('.menu-overlay').removeClass('overlay-active');
            
            jQuery('.hamburger-open > .fa').removeClass('fa-times-thin');
            jQuery('.hamburger-open > .fa').addClass('fa-bars');
            jQuery('header').css('background', 'rgba(255, 255, 255, 0.8)');
            
        }
        else {
            jQuery('.navigation').slideDown();
        }
    });

    // hide mobile menu on click in menu panel on item menu
    if (jQuery(window).width() <= 767 ){
        jQuery('li.menu-item > a').on(clickEvent, function () {
            console.log('clicked menu item!')
            jQuery('.navigation-wp').slideUp();
            jQuery('body').css('overflow-y', 'initial');
            jQuery('.menu-overlay').slideUp();
            jQuery('.menu-overlay').removeClass('overlay-active');
            jQuery('.hamburger-open > .fa').removeClass('fa-times-thin');
            jQuery('.hamburger-open > .fa').addClass('fa-bars');

        });
    };

    // click on page overlay when hamburger menu is open
    jQuery('.wrapper').on(clickEvent, function () {
        var menuOpenState = jQuery('.navigation-wp').css('display');
        if (menuOpenState == 'block') {
            jQuery('.navigation-wp').slideUp(400, function () {
                jQuery(this).css('display', 'none');
                jQuery('body').css('overflow-y', 'initial');
            });

            jQuery('.menu-overlay').fadeOut(400, function () {
                jQuery(this).css('display', 'none');
                jQuery('.menu-overlay').removeClass('overlay-active');
            });
            jQuery('.hamburger-open > .fa').removeClass('fa-times-thin');
            jQuery('.hamburger-open > .fa').addClass('fa-bars');
        }
    });

// The end of document.ready
});


