<?php

function controls_plugin_register() {
    wp_register_script(
        'plugin-controls-js',
        plugins_url( 'controls/block.js', __FILE__ ),
        array( 'wp-editor', 'wp-blocks', 'wp-components', 'wp-element' )
	);
	wp_register_style(
        'plugin-controls-css',
        plugins_url( 'controls/style.css', __FILE__ )
    );
    wp_register_style(
		'plugin-controls-editor-css',
		plugins_url( 'controls/editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'controls/editor.css' )
	);
    register_block_type( 'gutenberg-nb-controls/controls' 
                        ,array(
                            'style' => 'plugin-controls-css',
                            'editor_style' => 'plugin-controls-editor-css',
                            'editor_script' => 'plugin-controls-js',
                        ) 
    );
	// register_meta( 'post', 'nbsidebar_meta_block_field', array(
	// 	'show_in_rest' => true,
	// 	'single' => true,
	// 	'type' => 'string',
	// ) );
}
add_action( 'init', 'controls_plugin_register' );

// function controls_plugin_script_enqueue() {
//     wp_enqueue_script( 'plugin-controls-js' );
// }
// add_action( 'enqueue_block_editor_assets', 'controls_plugin_script_enqueue' );


// function controls_plugin_style_enqueue() {
//     wp_enqueue_style( 'plugin-controls-css' );
// }
// add_action( 'enqueue_block_assets', 'controls_plugin_style_enqueue' );

?>

