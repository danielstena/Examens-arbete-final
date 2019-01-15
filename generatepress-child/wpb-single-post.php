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


