<?php
function gutenberg_post_block() {
    wp_register_script(
        'guten-addons-script-dposts-editor',
        plugins_url( 'dynamicposts/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
		);
		wp_register_script(
			'guten-addons-script-dposts-script',
			plugins_url( 'dynamicposts/script.js', __FILE__ ),
			array()
		);
    wp_register_style(
        'guten-addons-script-dposts',
        plugins_url( 'dynamicposts/style.css', __FILE__ ),
        array( ),//'wp-edit-blocks'
        filemtime( plugin_dir_path( __FILE__ ) . 'dynamicposts/style.css' )
    );

    register_block_type( 'gutenberg-nb-blocks/dposts', array(
        'editor_script' => 'guten-addons-script-dposts-editor',
				'style'         => 'guten-addons-script-dposts',
				'script'         => 'guten-addons-script-dposts-script',
				'render_callback' => 'gutenberg_nb_block_latest_post',
    ) );
}
add_action( 'init', 'gutenberg_post_block' );


function gutenberg_nb_block_latest_post( $attributes, $content ) {
	$recent_posts = wp_get_recent_posts( array(
			'numberposts' => 1,
			'post_status' => 'publish',
	) );
	if ( count( $recent_posts ) === 0 ) {
			return 'No posts';
	}
	$post 		= $recent_posts[ 0 ];
	$post_id  = $post['ID'];
	$html 		= "<div id='applebtn'><button onclick='loginconsole()'></div>";
	return $html;


	return sprintf(
			'<a class="wp-block-my-plugin-latest-post" href="%1$s">%2$s</a>',
			esc_url( get_permalink( $post_id ) ),
			esc_html( get_the_title( $post_id ) )
	);
}

// register_block_type( 'gutenberg-nb-blocks/dposts', array(
// 	'render_callback' => 'gutenberg_nb_block_latest_post',
// ) );


// function gutenberg_examples_03_register_block() {

// 	if ( ! function_exists( 'register_block_type' ) ) {
// 		// Gutenberg is not active.
// 		return;
// 	}

// 	wp_register_script(
// 		'gutenberg-examples-03',
// 		plugins_url( 'block.js', __FILE__ ),
// 		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
// 		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
// 	);

// 	wp_register_style(
// 		'gutenberg-examples-03-editor',
// 		plugins_url( 'editor.css', __FILE__ ),
// 		array( 'wp-edit-blocks' ),
// 		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
// 	);

// 	wp_register_style(
// 		'gutenberg-examples-03',
// 		plugins_url( 'style.css', __FILE__ ),
// 		array( ),
// 		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
// 	);

// 	register_block_type( 'gutenberg-examples/example-03-editable', array(
// 		'style' => 'gutenberg-examples-03',
// 		'editor_style' => 'gutenberg-examples-03-editor',
// 		'editor_script' => 'gutenberg-examples-03',
// 	) );

//   if ( function_exists( 'wp_set_script_translations' ) ) {
//     /**
//      * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
//      * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
//      * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
//      */
//     wp_set_script_translations( 'gutenberg-examples-03', 'gutenberg-examples' );
//   }

// }
//add_action( 'init', 'gutenberg_examples_03_register_block' );





?>