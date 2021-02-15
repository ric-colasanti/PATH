

<?php get_header();?>
<div class="jumbotron path-jumbotron " style="margin-bottom:0">
<div class="container ">
<h1>Search results for query:</h1><h3>"<?php the_search_query(); ?>"</h3>

</div>
</div>
<div style="padding-top:15px;padding-bottom:5px;">
<div class="container path-search">

    <div class="row" style="margin:5px">
        <hr>;
        <?php
if ( have_posts() ) :
	?>
    <div class="about">
    <section style="max-width: 1240px; margin:auto;">

    
	<?php
	while ( have_posts() ) : the_post(); ?>

        <article class="post">
			<?php if ( has_post_thumbnail() ) { ?>
                <div class="small-thumbnail">
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'small-thumbnail' ); ?></a>
                </div>
			<?php } ?>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <p class="post-meta"><?php
				$categories = get_the_category();
				$comma      = ', ';
				$output     = '';

				if ( $categories ) {
					foreach ( $categories as $category ) {
						$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
					}
					echo trim( $output, $comma );
				} ?>
            </p>
            <h3><?php echo get_the_title(); ?></h3>

            <p>
				<?php echo get_the_excerpt() ?>
                <a href="<?php the_permalink() ?>">Read more &raquo</a>
            </p>
        </article>

	<?php endwhile;

else :
	echo '<p>No search results found!</p>';

endif;
?>
    </div>
    </div>

<?php
get_footer();

?>