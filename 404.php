<?php
/**
 * The 404 template file
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

<section class="page-404-section">
    <table>
        <tr>
            
            <td style="vertical-align: middle">
                <div class="container">


                            <div class="centered-404-msg-wrapper">
                                <figure>
                                    <img src="<?php bloginfo('template_url')?>/img/chic.png" alt="">
                                </figure>
                                <p class="message-404-text">Looks like the page you were looking for doesn't exist. Sorry about that.</p>
                                <a href="<?php echo home_url(); ?>" class="back-home-404-btn">back home</a>
                            </div>


                </div>
            </td> 
        </tr>
    </table>
    
</section>

<?php get_footer(); ?>