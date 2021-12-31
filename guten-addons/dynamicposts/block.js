(function(blocks,element,data){
var el = element.createElement,
registerBlockType = blocks.registerBlockType,
withSelect = data.withSelect;

registerBlockType( 'gutenberg-nb-blocks/dposts', {
    title: 'Dynamic Posts NB',

    icon: 'megaphone',

    category: 'widgets',

    edit: withSelect( function( select ) {
        return {
            posts: select( 'core' ).getEntityRecords( 'postType', 'post' )
        };
    } )( function( props ) {

        if ( ! props.posts ) {
            return "Loading...";
        }

        if ( props.posts.length === 0 ) {
            return "No posts";
        }
        var className = props.className;
        var post = props.posts[ 0 ];

        return el(
            'a',
            { className: className, href: post.link },
            post.title.rendered
        );
    } ),

    save: function() {
        // Rendering in PHP
        return null;
    },

} );
}(window.wp.blocks,
    window.wp.element,
    window.wp.data));