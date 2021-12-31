<?php



function sidebar_plugin_register() {
    wp_register_script(
        'plugin-sidebar-js',
        plugins_url( 'sidebar/block.js', __FILE__ ),
        array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data' )
	);
	wp_register_style(
        'plugin-sidebar-css',
        plugins_url( 'sidebar/style.css', __FILE__ )
	);
	register_meta( 'post', 'nbsidebar_meta_block_field', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'string',
	) );
}
add_action( 'init', 'sidebar_plugin_register' );

function sidebar_plugin_script_enqueue() {
    wp_enqueue_script( 'plugin-sidebar-js' );
}
add_action( 'enqueue_block_editor_assets', 'sidebar_plugin_script_enqueue' );


function sidebar_plugin_style_enqueue() {
    wp_enqueue_style( 'plugin-sidebar-css' );
}
add_action( 'enqueue_block_assets', 'sidebar_plugin_style_enqueue' );

?>

