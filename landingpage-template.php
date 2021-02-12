<?php /* Template Name:  Landingpage-template */ ?>
<?php get_header();?>


<?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
                <p class="debug">Page</p>

            
<?php get_footer();?>


