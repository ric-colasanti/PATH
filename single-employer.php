<?php get_header();?>

<div class="container path-main" style="margin-top:30px">
    <div class="row">
        <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
    </div>

</div>
<p class="debug"> EMPLOYER<p>
<?php get_footer();?>