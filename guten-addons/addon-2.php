<?php
function gutenberg_boilerplate_block() {
    wp_register_script(
        'guten-addons-script-step02-editor',
        plugins_url( 'step-2/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );
    wp_register_style(
        'guten-addons-script-step02',
        plugins_url( 'step-2/style.css', __FILE__ ),
        array( ),//'wp-edit-blocks'
        filemtime( plugin_dir_path( __FILE__ ) . 'step-2/style.css' )
    );

    register_block_type( 'gutenberg-nb-blocks/step-02', array(
        'editor_script' => 'guten-addons-script-step02-editor',
        'style'         => 'guten-addons-script-step02',
    ) );
}
add_action( 'init', 'gutenberg_boilerplate_block' );



function gutenberg_examples_03_register_block() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	wp_register_script(
		'gutenberg-examples-03',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	wp_register_style(
		'gutenberg-examples-03-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);

	wp_register_style(
		'gutenberg-examples-03',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

	register_block_type( 'gutenberg-examples/example-03-editable', array(
		'style' => 'gutenberg-examples-03',
		'editor_style' => 'gutenberg-examples-03-editor',
		'editor_script' => 'gutenberg-examples-03',
	) );

  if ( function_exists( 'wp_set_script_translations' ) ) {
    /**
     * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
     * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
     * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
     */
    wp_set_script_translations( 'gutenberg-examples-03', 'gutenberg-examples' );
  }

}
//add_action( 'init', 'gutenberg_examples_03_register_block' );





?>