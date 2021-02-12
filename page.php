<?php get_header();?>

<div class="container path-content">
<?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
                <p class="debug">Page</p>
</div>
            
<?php get_footer();?>


