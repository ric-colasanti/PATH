<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<meta name="description" content="">
<meta name="author" content="">

<meta name="viewport" content="width=device-width">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark path-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><img 
                    src="<?php echo get_theme_mod('image_control_banner');?>" alt="path" height="80"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <?php
                    wp_nav_menu( array(
                        "theme_location" => "primary",
                        "menu_class"     => "primary-menu",
                        "container"      => false,
                        "items_wrap"     => '%3$s',
                        'before'         => " &nbsp; <span class = 'path-item'>",
                        'after'          => " </span> &nbsp; ",
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron path-jumbotron " style="margin-bottom:0">
        <div class="container ">
            <h1><?php the_title();?></h1>
        </div>
    </div>
    <div class="path-background" style="padding-top:15px;padding-bottom:5px;">