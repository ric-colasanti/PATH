<?php get_header('jumbotron');?>

<div class="container">

    <div class="row" style="margin:5px">
        <hr>
        <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
        <hr>
    </div>

</div>

    <p class="debug">waf</p>

    <?php get_footer('single');?>