<?php
$path = get_stylesheet_directory_uri() . "/assets/img/";
/*
 * Template Name: Landing Page
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>
	<div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
			<div class="inside-article frontpage">
				<div id="frontpaige_container">
					<div class="frontpage_cards">
						<a href="/bryta-monster/">
							<p>Bryta mönster</p>
							<img class="frontpage_images" src="<?php echo $path ?>bryta_monster.png">
						</a>
					</div>
					<div class="frontpage_cards">
						<a href="/ar-vikten-hopplos/">
							<p>Är vikten hopplös?</p>
							<img class="frontpage_images" src="<?php echo $path ?>vikt_hopplos.png">
						</a>
					</div>
					<div class="frontpage_cards">
						<a href="/bryta-monster/">
							<p>Glöm inte grönsakerna</p>
							<img class="frontpage_images" src="<?php echo $path ?>veggies.jpg">
						</a>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

get_footer();

if ( ! function_exists( 'generate_add_footer_info' ) ) {
	add_action( 'generate_credits', 'generate_add_footer_info' );
	/**
	 * Add the copyright to the footer
	 *
	 * @since 0.1
	 */
	function generate_add_footer_info() {
		$copyright = sprintf( '<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s" itemprop="url">%5$s</a>',
			date( 'Y' ),
			get_bloginfo( 'name' ),
			esc_url( 'https://vitalhalsa.se' ),
			_x( 'Powered by', 'Vital Hälsa', 'Vital Hälsa' ),
			__( '', '' )
		);

		echo apply_filters( 'generate_copyright', $copyright ); // WPCS: XSS ok.
	}
}
