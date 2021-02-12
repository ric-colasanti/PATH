<?php //Loading in stylesheets

function enqueue_customtheme_styles() {
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css");
    wp_enqueue_style("awesome", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style("customtheme-style", get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", '', 1, false);
}

add_action("wp_enqueue_scripts", "enqueue_customtheme_styles");

//Add dynamic menu

function customtheme_setup() {
    //Add dynamic menu
    register_nav_menus(array("primary"=> __("Main Menu", "PATH")));

    add_theme_support("title-tag");
}

add_action("after_setup_theme", "customtheme_setup");
// Add menus and the ability to add thumbnails to pages in the theme
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('editor-styles');
add_editor_style('editor-style.css');



// Adding post types and post type taxonomy
function pth_waf_post_type() {
    $args=array('labels'=> array('name'=> __('Families pages', 'path_theme'),
            'singular_name'=> __('Families page', 'path_theme'),
        ),
        'hierarchical'=> true,
        'public'=> true,
        'show_in_rest'=> true,
        'has_archive'=> true,
        'menu_icon'=> 'dashicons-images-alt2',
        'supports'=> array('title', 'editor', 'thumbnail', 'excerpt', 'can_export'),
    );
    register_post_type('waf', $args);
}


function pth_waf_post_type_taxonomy() {
    register_taxonomy('waf-cat',
        'waf',
        array('hierarchical'=> true,
            'label'=> __('Family Catagory', 'path_theme'),
            'query_var'=> true,
            'rewrite'=> true,
        ));
}

function pth_professionals_post_type() {
    $args=array('labels'=> array('name'=> __('Professionals pages', 'path_theme'),
            'singular_name'=> __('Professionals page', 'path_theme'),
        ),
        'hierarchical'=> true,
        'public'=> true,
        'show_in_rest'=> true,
        'has_archive'=> true,
        'menu_icon'=> 'dashicons-images-alt2',
        'supports'=> array('title', 'editor', 'thumbnail', 'excerpt', 'can_export'),
    );
    register_post_type('professionals', $args);
}


function pth_professionals_post_type_taxonomy() {
    register_taxonomy('professionals-cat',
        'professionals',
        array('hierarchical'=> true,
            'label'=> __('Professionals Catagory', 'path_theme'),
            'query_var'=> true,
            'rewrite'=> true,
        ));
}

function pth_employer_post_type() {
    $args=array('labels'=> array('name'=> __('Employer pages', 'path_theme'),
            'singular_name'=> __('Employer page', 'path_theme'),
        ),
        'hierarchical'=> true,
        'public'=> true,
        'show_in_rest'=> true,
        'has_archive'=> true,
        'menu_icon'=> 'dashicons-images-alt2',
        'supports'=> array('title', 'editor', 'thumbnail', 'excerpt', 'can_export', 'can_export'),
    );
    register_post_type('employer', $args);
}


function pth_employer_post_type_taxonomy() {
    register_taxonomy('employer-cat',
        'employer',
        array('hierarchical'=> true,
            'label'=> __('Employer Catagory', 'path_theme'),
            'query_var'=> true,
            'rewrite'=> true,
        ));
}

function pth_multimedia_post_type() {
    $args=array('labels'=> array('name'=> __('Multimedia pages', 'path_theme'),
            'singular_name'=> __('Multimedia page', 'path_theme'),
        ),
        'hierarchical'=> true,
        'public'=> true,
        'show_in_rest'=> true,
        'has_archive'=> true,
        'menu_icon'=> 'dashicons-images-alt2',
        'supports'=> array('title', 'editor', 'thumbnail', 'can_export'),
    );
    register_post_type('multimedia', $args);
}

function pth_multimedia_post_type_taxonomy() {
    register_taxonomy('multimedia-cat',
        'multimedia',
        array('hierarchical'=> true,
            'label'=> __('Multimedia Catagory', 'path_theme'),
            'query_var'=> true,
            'rewrite'=> true,
        ));
}

function pth_elearning_post_type() {
    $args=array('labels'=> array('name'=> __('E-learning pages', 'path_theme'),
            'singular_name'=> __('E-learning page', 'path_theme'),
        ),
        'hierarchical'=> true,
        'public'=> true,
        'show_in_rest'=> true,
        'has_archive'=> true,
        'menu_icon'=> 'dashicons-images-alt2',
        'supports'=> array('title', 'editor', 'thumbnail', 'can_export'),
    );
    register_post_type('elearning', $args);
}





// add_action calls all the functions in the register.php file
add_action('init', 'pth_waf_post_type');
add_action('init', 'pth_employer_post_type');
add_action('init', 'pth_professionals_post_type');
add_action('init', 'pth_multimedia_post_type');
add_action('init', 'pth_e_learning_post_type');

add_action('init', 'pth_waf_post_type_taxonomy');
add_action('init', 'pth_employer_post_type_taxonomy');
add_action('init','pth_multimedia_post_type_taxonomy');
add_action('init', 'pth_professionals_post_type_taxonomy');



//Widget locations
function init_widgets($id) {
    register_sidebar(array('name'=> 'Sidebar',
            'id'=> 'sidebar',
            'before_widget'=> '',
            'after_widget'=> '',
            'before_title'=> '',
            'after_title'=> '',
        ));

    register_sidebar(array('name'=> 'Multimedia',
            'id'=> 'multimedia',
            'before_widget'=> '',
            'after_widget'=> '',
            'before_title'=> '',
            'after_title'=> '',
        ));
}

add_action('widgets_init', 'init_widgets');


// my_login_logo adds logo to the admin login page
function my_login_logo() {

    ?><style type="text/css">
    #login h1 a,
    .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri();
        ?>/assets/img/logos/Pram_logo.png);
        height: 65px;
        width: 65px;
        background-size: 65px 65px;
        background-repeat: no-repeat;
        padding-bottom: 30px;
    }
</style><?php
}

add_action('login_enqueue_scripts', 'my_login_logo');

function deactivate_plugin_conditional() {
    if ( is_plugin_active('gutentor/gutentor.php') ) {
    deactivate_plugins('gutentor/gutentor.php');    
    }
}

function activate_plugin_conditional() {
    activate_plugins('gutentor/gutentor.php');    
}

// pth_u_control will restrict the access and visibility of functions to non admin users. This is not fully implemented yet
// https://premium.wpmudev.org/blog/limit-access-wordpress-dashboard/
function pth_u_control() {
    $user=wp_get_current_user();
    //$user_locale = $user->roles[0];
    $roles=(array) $user->roles;
    $arrlength=count($roles);

    if($arrlength>0) {
        $user_locale=$roles[0];


        if($user_locale !='administrator') {
            add_action('admin_head', 'remove_super_menu_pages');
            add_action('admin_head', 'activate_plugin_conditional');
            $user->add_cap('manage_categories', false);
            add_action('admin_head', 'remove_menu_pages');
            add_action('admin_head', 'remove_new_content_mnu');
            add_filter('wp_handle_upload_prefilter', 'only_upload_for_admin');
            add_filter('pre_get_posts', 'exclude_category_home');
            add_filter('pre_get_posts', 'exclude_category_posts');
            add_action('wp_before_admin_bar_render', 'remove_new_content_mnu');
            add_filter('ure_supress_administrators_protection', 'switch_off_ure_administrators_protection', 10, 1);
            add_action('deleted_post', 'prevent_undeleteable_page_deletion');
            add_action('trashed_post', 'prevent_undeleteable_page_trash');
            add_action('wp_before_admin_bar_render', 'remove_mysites_comment_link');
        }
    }
}

function remove_mysites_comment_link () {
    global $wp_admin_bar;

    foreach ((array) $wp_admin_bar->user->blogs as $blog) {
        $menu_id_c='blog-'. $blog->userblog_id . '-c';
        $wp_admin_bar->remove_menu($menu_id_c);
    }
}

function only_upload_for_admin($file) {
    if ( ! current_user_can('manage_options')) {
        $file['error']='You can\'t upload images without admin privileges!';
    }

    return $file;
}

function remove_super_menu_pages() {
    remove_menu_page('themes.php'); //Appearance
    remove_menu_page('plugins.php'); //Plugins
    remove_menu_page('tools.php'); //Tools
    remove_menu_page('options-general.php'); //Settings
    remove_menu_page('edit.php?post_type=acf');
}


function remove_menu_pages() {
    remove_menu_page('index.php'); //Dashboard
    remove_menu_page('jetpack'); //Jetpack* 
    remove_menu_page('upload.php'); //Media
    remove_menu_page('edit.php'); //Post
    remove_menu_page('edit-comments.php'); //Comments
    remove_menu_page('users.php'); //Users
}

function remove_new_content_mnu() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-content');
}


if ( ! is_super_admin()) {
    add_action('admin_init', 'pth_u_control');
}
add_action('admin_init', 'activate_plugin_conditional');
// restrict access to the site to only those lodged in.
// This turned off at moment
// add_action( 'template_redirect', function() {

// 	// Front end only and prevent redirections on ajax functions
// 	if ( is_admin() || wp_doing_ajax() ) {
// 		return;
// 	}

// 	// Redirect all pages to the login page if user isn't logged in
// 	if ( ! is_user_logged_in() ) {
// 		wp_redirect( esc_url( wp_login_url() ), 307 );
// 	}

// } );


add_action('init', 'pth_u_control');

add_action('customize_register', 'cd_customizer_settings');

function cd_customizer_settings($wp_customize) {
    $wp_customize->add_section('cd_colors', array('title'=> 'Colors',
            'priority'=> 30,
        ));
// bacgroubd color
    $wp_customize->add_setting('background_color', array('default'=> '#ffffff',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array('label'=> 'Background Color',
                'section'=> 'cd_colors',
                'settings'=> 'background_color',
            )));

// jumbotron background color    
    $wp_customize->add_setting('jumbotron_background_color', array('default'=> '#ffffff',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jumbotron_background_color', array('label'=> 'Jumbotron Background Color',
                'section'=> 'cd_colors',
                'settings'=> 'jumbotron_background_color',
            )));

// jumbotron text color 
    $wp_customize->add_setting('jumbotron_text_color', array('default'=> '#ffffff',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jumbotron-text_color', array('label'=> 'Jumbotron Text Color',
                'section'=> 'cd_colors',
                'settings'=> 'jumbotron_text_color',
            )));

// footer background color             
    $wp_customize->add_setting('footer_background_color', array('default'=> '#ffffff',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array('label'=> 'Footer Background Color',
                'section'=> 'cd_colors',
                'settings'=> 'footer_background_color',
            )));

// footer text color             
    $wp_customize->add_setting('footer_text_color', array('default'=> '#ffffff',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array('label'=> 'Footer Text Color',
                'section'=> 'cd_colors',
                'settings'=> 'footer_text_color',
            )));
    
// header background color             
    $wp_customize->add_setting('header_background_color', array('default'=> '#ffffff',
    'transport'=> 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array('label'=> 'Header Background Color',
        'section'=> 'cd_colors',
        'settings'=> 'header_background_color',
    )));

//nav background color
    $wp_customize->add_setting('menu_background_color', array('default'=> '#222222',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_background_color', array('label'=> 'Menu Background Color',
                'section'=> 'cd_colors',
                'settings'=> 'menu_background_color',
            )));

//nav text color
    $wp_customize->add_setting('menu_item_color', array('default'=> '#000000',
            'transport'=> 'refresh',
        ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_item_color', array('label'=> 'Menu Item Color',
                'section'=> 'cd_colors',
                'settings'=> 'menu_item_color',
            )));


// category_even background color             
    $wp_customize->add_setting('category_even_background_color', array('default'=> '#ffffff',
    'transport'=> 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'category_even_background_color', array('label'=> 'Category Even Background Color',
        'section'=> 'cd_colors',
        'settings'=> 'category_even_background_color',
    )));

// category even  text color             
    $wp_customize->add_setting('category_even_text_color', array('default'=> '#ffffff',
    'transport'=> 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'category_even_text_color', array('label'=> 'Category Even Text Color',
        'section'=> 'cd_colors',
        'settings'=> 'category_even_text_color',
    )));
    

// category_odd background color             
    $wp_customize->add_setting('category_odd_background_color', array('default'=> '#ffffff',
    'transport'=> 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'category_odd_background_color', array('label'=> 'Category Odd Background Color',
        'section'=> 'cd_colors',
        'settings'=> 'category_odd_background_color',
    )));

// category odd  text color             
    $wp_customize->add_setting('category_odd_text_color', array('default'=> '#ffffff',
    'transport'=> 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'category_odd_text_color', array('label'=> 'Category Odd Text Color',
        'section'=> 'cd_colors',
        'settings'=> 'category_odd_text_color',
    )));


//image            
    $wp_customize->get_setting( 'image_control_banner' )->transport = 'postMessage';
    // Add and manipulate theme images to be used.
    $wp_customize->add_section('imageoner', array(
        "title" => 'Theme Images',
        "priority" => 28,
        "description" => __( 'Upload image to display as top banner.', 'SAND' )
        ));
    
// theme image          
    $wp_customize->add_setting('image_control_banner', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_banner', array(
                'label' => __( 'Featured banner', 'SAND' ),
                'section' => 'imageoner',
                'settings' => 'image_control_banner',
            )));

// jubmotron image            
    $wp_customize->add_setting('image_control_jumbotron', array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control_jumbotron', array(
                    'label' => __( 'Featured jumbotron', 'SAND' ),
                    'section' => 'imageoner',
                    'settings' => 'image_control_jumbotron',
                )));

}


add_action('wp_head', 'cd_customizer_css');

function cd_customizer_css() {
    ?>
<!-- <?php echo get_theme_mod('header_background_color', '#ffffff');?> -->
<style type="text/css">
    .path-jumbotron {
        /* background: #<?php echo get_theme_mod('jumbotron_background_color', '#ffffff');
        ?>!important;
        color: #<?php echo get_theme_mod('jumbotron_text_color', '#ffffff');
        ?>!important; */
        background: <?php echo get_theme_mod('jumbotron_background_color', '#ffffff');
        ?> !important;
        color: <?php echo get_theme_mod('jumbotron_text_color', '#ffffff');
        ?>!important;
        background-image: url("<?php echo get_theme_mod('image_control_jumbotron');?>")!important;
    }

    .path-navbar {
        background: <?php echo get_theme_mod('menu_background_color', '#222222');
        ?> !important;
    }
    
    .path-background{
        background-color: #<?php echo get_theme_mod('background_color', '#ffffff');
        ?> !important;
    }
    .path-navbar a{
        color: <?php echo get_theme_mod('menu_item_color', '#000000');
        ?> !important;
    }
    .navbar-toggler .line{
    background-color: <?php echo get_theme_mod('menu_item_color', '#000000');
        ?> !important;
    }
    .path-footer{
        background-color: #<?php echo get_theme_mod('footer_background_color', '#ffffff');
        ?> !important;
    }
    .navbar-toggler-icon {
        color: <?php echo get_theme_mod('menu_item_color', '#000000');
        ?> !important;
    }

    .path-content{
        background-color:#ffffff;
        width:100%;
        padding:5px;
    }

    .path-footer{
        background-color:<?php echo get_theme_mod('footer_background_color', '#ffffff');?>;
        color:<?php echo get_theme_mod('footer_text_color', '#000000');?>;
    }

    .path-header{
        background-color:<?php echo get_theme_mod('header_background_color', '#ffffff');?>;
    }

    .even{
        background-color:<?php echo get_theme_mod('category_even_background_color', '#ffffff');?>;
        color:<?php echo get_theme_mod('category_even_text_color', '#000000');?>;

    }
    .even a{
        color:<?php echo get_theme_mod('category_even_text_color', '#000000');?>;

    }
    .odd{
        background-color:<?php echo get_theme_mod('category_odd_background_color', '#ffffff');?>;
        color:<?php echo get_theme_mod('category_odd_text_color', '#000000');?>;
    }    
    .odd a{
        color:<?php echo get_theme_mod('category_odd_text_color', '#000000');?>;
    }
</style><?php
}

?>