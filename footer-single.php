
<div class="even">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
$taxonomies = get_object_taxonomies( get_post_type( get_the_ID() ) );
foreach ( $taxonomies as $taxa ) {
	// echo $taxa;
	$terms = get_the_terms( get_the_ID(), $taxa );

	// Check if any term exists
	if ( ! empty( $terms ) && is_array( $terms ) ) {
		// Run a loop and print them all
		foreach ( $terms as $term ) { ?>
                <h3> <?php echo $term->name; ?></h3>
            </div>
            <div class="col-md-4">
                <?php
			$wpb_all_query = new WP_Query( array( 'post_type'      => get_post_type( get_the_ID() ),
			                                      'post_status'    => 'publish',
			                                      'tax_query'      => array(
				                                      array(
					                                      'taxonomy' => $taxa,
					                                      'terms'    => $term->term_id
				                                      )
			                                      ),
			                                      'posts_per_page' => - 1
			) );
			if ( $wpb_all_query->have_posts() ) {
				?>
                <ul style="margin-top:0px;"><?php
				while ( $wpb_all_query->have_posts() ) {

					$wpb_all_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php
				}
				?></ul><?php
			}
			wp_reset_postdata();
		}
	}
}
?>
            </div>
        </div>

    </div>
</div>
<div class="jumbotron text-center path-footer" style="margin-bottom:0">
<div class="container ">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Logo_PATH.png"
                    class="logo-footer" height="150" width="auto" alt="2 2Seas">
            </div>
            <div class="col-sm-6 ">
                <p>
                    PATH – PerinAtal menTal Health –
                    is part of the Interreg VA 2Seas programme and receives funding
                    from the European Regional Development Fund.</p>
            </div>
        </div>
    </div>
  <i class="fa fa-twitter-square" style="font-size:36px"></i>
  <i class="fa fa-youtube-square" style="font-size:36px"></i>
</div>

<?php wp_footer();?>
</body>
</html>