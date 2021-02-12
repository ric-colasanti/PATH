<?php get_header();?>
<div class="jumbotron " style="margin-bottom:0">
	<div class="container">
  	<h1><?php the_title();?></h1>
  </div>
</div>
<div class="container" style="margin-top:30px">
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


