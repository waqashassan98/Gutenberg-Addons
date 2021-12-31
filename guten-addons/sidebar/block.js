( function( wp ) {
    var registerPlugin = wp.plugins.registerPlugin;
    var PluginSidebar = wp.editPost.PluginSidebar;
    var el = wp.element.createElement;
    var Text = wp.components.TextControl;
    var withSelect = wp.data.withSelect;
    var withDispatch = wp.data.withDispatch;

    var mapSelectToProps = function( select ) {
        return {
            metaFieldValue: select( 'core/editor' )
                .getEditedPostAttribute( 'meta' )
                [ 'nbsidebar_meta_block_field' ]
        }
    }

    var mapDispatchToProps = function( dispatch ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch( 'core/editor' ).editPost(
                    { meta: { nbsidebar_meta_block_field: value } }
                );
            }
        }
    }

    var MetaBlockField = function( props ) {
        return el( Text, {
            label: 'Meta Block Field',
            value: props.metaFieldValue,
            onChange: function( content ) {
                props.setMetaFieldValue( content );
            },
        } );
    }

    var MetaBlockFieldWithData = withSelect( mapSelectToProps )( MetaBlockField );
    var MetaBlockFieldWithDataAndActions = withDispatch( mapDispatchToProps )( MetaBlockFieldWithData );

    registerPlugin( 'nbsidebar', {
        render: function() {
            return el( PluginSidebar,
                {
                    name: 'nbsidebar',
                    icon: 'admin-post',
                    title: 'NB Sidebar',
                },
                el( 'div',
                    { className: 'plugin-sidebar-content' },
                    el( MetaBlockFieldWithDataAndActions  )
                )
            );
        },
    } );
} )( window.wp );






