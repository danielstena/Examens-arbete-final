<?php
    function turnoffcapital(){
        return true;
    }

    //Add favicon
    function myfavicon() {
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/assets/images/favicon.ico" />';
    }
    add_action('wp_head', 'myfavicon');

    //* Remove the site description
    remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
    
    function my_theme_enqueue_styles() {

        $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Bard theme.

        wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array( $parent_style ),
            wp_get_theme()->get('Version')
        );
    }
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

    function bard_setup() {
        // Make theme available for translation
        load_theme_textdomain( 'bard', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title for us
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support( 'post-thumbnails' );

        // Add theme support for Custom Logo.
        $custom_logo_defaults = array(
            'width'       => 450,
            'height'      => 200,
            'flex-width'  => true,
            'flex-height' => true,
        );
        add_theme_support( 'custom-logo', $custom_logo_defaults );

        // Add theme support for Custom Header.
        $custom_header_defaults = array(
            'width'       			=> 1300,
            'height'      			=> 500,
            'flex-width'  			=> true,
            'flex-height' 			=> true,
            'default-image' 		=> esc_url( get_stylesheet_directory_uri() ) .'/assets/images/blank-board-empty-1050308.jpg',
            'default-text-color'	=> '111',
        );
        add_theme_support( 'custom-header', $custom_header_defaults );

        // Add theme support for Custom Background.
        $custom_background_defaults = array(
            'default-color'	=> '',
        );
        add_theme_support( 'custom-background', $custom_background_defaults );

        // Set the default content width.
        $GLOBALS['content_width'] = 960;

        // This theme uses wp_nav_menu() in two locations
        register_nav_menus( array(
            'top' 		=> __( 'Top Menu', 'bard' ),
            'main' 		=> __( 'Main Menu', 'bard' ),
            'footer' 	=> __( 'Footer Menu', 'bard' ),
        ) );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // WooCommerce
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // Theme Activation Notice
        global $pagenow;
        
        if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
            add_action( 'admin_notices', 'bard_activation_notice' );
        }
        
    }
    add_action( 'after_setup_theme', 'bard_setup' );

    //LÅT DENNA VARA UTKOMMENTERAD ETT TAG SEN TAS BORT
    Wp_enqueue_style('customstyle',  get_template_directory_uri(). '/style.css',  array(), '1.0.0', 'all') ;

    //DENNA FUNKTIONEN TAR BORT VERISION
    function wpb_remove_version() {
        return '';
        }
        add_filter('the_generator', 'wpb_remove_version');

    //SKAPAR EN DEFAULT AVATAR FÖR BLOGGEN
    add_filter( 'avatar_defaults', 'wpb_new_gravatar' );
    
    function wpb_new_gravatar ($avatar_defaults) {
        $myavatar = 'http://example.com/wp-content/uploads/2017/01/wpb-default-gravatar.png';
        $avatar_defaults[$myavatar] = "Default Gravatar";
        return $avatar_defaults;
    }

    //Döljer resultatet vid misslyckad inloggning till admin
    function no_wordpress_errors(){
        return 'Something is wrong!';
    }   
    add_filter( 'login_errors', 'no_wordpress_errors' );

    //Funktion för att visa antal registrerade användare
    function wpb_user_count() { 
        $usercount = count_users();
        $result = $usercount['total_users']; 
        return $result;   
    } 
    // Creating a shortcode to display user count
    add_shortcode('user_count', 'wpb_user_count');

    //automatisk uppdatering av tema och plugins
    add_filter( 'auto_update_theme', '__return_true' );
    add_filter( 'auto_update_plugin', '__return_true' );
?>