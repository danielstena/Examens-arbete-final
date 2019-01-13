<?php

function turnoffcapital(){
    return true;
}

function my_theme_enqueue_styles() {

$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the generatepress theme.

wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('Version')
);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Function för att lägga till google fonts i header
add_action('wp_head', 'wpse_43672_wp_head');
function wpse_43672_wp_head(){
    ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Poiret+One|Tangerine" rel="stylesheet">
    <?php 
}

if ( ! function_exists( 'generate_construct_footer' ) ) {
	add_action( 'generate_footer', 'generate_construct_footer' );
	/**
	 * Build our footer.
	 *
	 * @since 1.3.42
	 */
	function generate_construct_footer() {
        $path = get_stylesheet_directory_uri() . "/assets/img/";
		?>
		<footer class="site-info" <?php generate_do_microdata( 'footer' ); ?>>
			<div class="inside-site-info <?php if ( 'full-width' !== generate_get_option( 'footer_inner_width' ) ) : ?>grid-container grid-parent<?php endif; ?>">
				<?php
				/**
				 * generate_before_copyright hook.
				 *
				 * @since 0.1
				 *
				 * @hooked generate_footer_bar - 15
				 */
				do_action( 'generate_before_copyright' );
                ?>
                <div class="social_media_links">
                    <div id="instagram">
                        <a href="#">
                            <img src="<?php echo $path ?>instagram.svg">
                        </a>
                    </div>
                    <div id="facebook">
                        <a href="https://www.facebook.com/Vital-H%C3%A4lsa-Funktionsmedicin-310590372897109/">   
                            <img src="<?php echo $path ?>fb.svg">
                        </a>
                    </div>
                </div>
				<div class="copyright-bar">
                    <div>
                        <?php
                        /**
                         * generate_credits hook.
                         *
                         * @since 0.1
                         *
                         * @hooked generate_add_footer_info - 10
                         */
                        do_action( 'generate_credits' );
                        ?>
                    </div>
                        
                    <div>
                        jane.forslund@live.se
                    </div>
                    <div>
                        ORGNR: SE751030488901
                    </div>
				</div>
			</div>
		</footer><!-- .site-info -->
		<?php
	}
}
// Funktion för att flytta positionen på kr till efter priset.
add_filter( 'woocommerce_price_format', 'custom_price_format', 10, 2 );
    function custom_price_format( $format, $curreny_pos ) {

    if( '&#107;&#114;' == get_woocommerce_currency_symbol() ) {
    return '%2$s&nbsp;%1$s';
    }

    return $format;
}