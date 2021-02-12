<?php /* Template Name: Families-template */ ?>

<?php get_header(); ?>

<!-- Sections -->
<!--<div class="container " >-->
<!-- <div class="row ">
        <div class="path-content"> -->
<?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
<!-- </div>
    </div> -->

<!-- </div> -->

<?php
$count     = 0;
$wcatTerms = get_terms( 'waf-cat', array( 'hide_empty' => 0, 'parent' => 0 ) );
foreach (
	$wcatTerms

	as $wcatTerm
) : ?>
<div class="<?php 
        if ($count==0){
            echo even;
        }else{
            echo odd;
        }?>">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>
                    <?php echo $wcatTerm->name; ?>
                </h1>

                <p>
                    <?php echo $wcatTerm->description; ?>
                </p>

            </div>
            <div class="col-md-4">
                <ul>
                    <?php
								$wpb_all_query = new WP_Query( array(
									'post_type'      => 'waf',
									'post_status'    => 'publish',
									'tax_query'      => array(
										array(
											'taxonomy' => 'waf-cat',
											'terms'    => $wcatTerm->term_id
										)
									),
									'posts_per_page' => - 1
								) );
								if ( $wpb_all_query->have_posts() ) :
									while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata();?>
                </ul>
            </div>
        </div>

    </div>
    <?php $count += 1;
	if($count>= 2){
	    $count=0;
    }
endforeach; ?>
    <p class="debug">WAF</p>

</div>
<!--    <h1>WAF main</h1>-->
<?php
get_footer();
?>