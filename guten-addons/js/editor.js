// (function() {
    
    // var allowedBlocks = [
    //     'core/paragraph',
    //     'core/image',
    //     'core/html',
    //     'core/freeform',
    //     'core/quote'
    // ];



    wp.domReady( function() {
        wp.blocks.registerBlockStyle( 'core/quote', {
            name: 'quote-style-NB',
            label: 'Modern Quote Style'
        } );
        // wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
        // wp.blocks.getBlockTypes().forEach( function( blockType ) {
        //     if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
        //         wp.blocks.unregisterBlockType( blockType.name );
        //     }
        // } );
        // var customPreviewMessage = function() {
        //     return '<b>Post preview is being generated!</b>';
        // };
        
        // wp.hooks.addFilter( 'editor.PostPreview.interstitialMarkup', 'my-plugin/custom-preview-message', customPreviewMessage );
    } );

// })