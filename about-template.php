<?php /* Template Name:  AboutPage-template */ ?>
<?php get_header(); ?>


<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}
?>
<p class="debug">About Page</p>

<div class="flex-container">
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/API_Logo.png" height="200"
             width="400" alt=""/>
    </div>

    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/BU_Logo.png" height="200" width="400"
             alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Douai_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/EPSM.png" height="200" width="400"
             alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Gehechtheid_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Health_Europe_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/IHV_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Kent_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Kent_Midway_Logo.png"
             height="200" width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Maasstad_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Mind_logo.png" hheight="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/Odisee_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/SouthH_Logo.png" height="200"
             width="400" alt=""/>
    </div>
    <div class="path-partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/UZA_Logo.png " height="200"
             width="400" alt=""/>
    </div>
</div>

<hr>
</div>
<?php get_footer(); ?>

