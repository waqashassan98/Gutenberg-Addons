<?php

function guton_addons_enqueue() {
    wp_enqueue_script(
        'guten-addons-script',
        plugins_url( 'js/editor.js', __FILE__ ),
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'js/editor.js' )
    );
}
add_action( 'enqueue_block_editor_assets', 'guton_addons_enqueue' );

function guton_addons_stylesheet() {
    wp_enqueue_style( 'guten-addons-style', plugins_url( 'css/style.css', __FILE__ ) );
}
add_action( 'enqueue_block_assets', 'guton_addons_stylesheet' );



function guton_block_1() {
    wp_register_script(
        'guten-addons-script-step01',
        plugins_url( '/js/step-01/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );

    register_block_type( 'gutenberg-nb-blocks/step-01', array(
        'editor_script' => 'guten-addons-script-step01',
    ) );
}
add_action( 'init', 'guton_block_1' );



// function my_plugin_allowed_block_types( $allowed_block_types, $post ) {
//     // if ( $post->post_type !== 'post' ) {
//     //     return $allowed_block_types;
//     // }
//     return array( 'core/paragraph' );
// }

// add_filter( 'allowed_block_types', 'my_plugin_allowed_block_types', 10, 2 );
?>