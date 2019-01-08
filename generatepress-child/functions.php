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
