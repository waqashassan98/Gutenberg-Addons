( function( wp ) {

    var el = wp.element.createElement;
    var Fragment = wp.element.Fragment;
    var registerBlockType = wp.blocks.registerBlockType;
    var RichText = wp.editor.RichText;
    var BlockControls = wp.editor.BlockControls;
    var AlignmentToolbar = wp.editor.AlignmentToolbar;

    var panel = wp.components.panel;
    var PanelBody = wp.components.PanelBody;
    var PanelRow = wp.components.PanelRow;


    registerBlockType( 'gutenberg-nb-controls/controls', {
        title: 'NB Controls',

        icon: 'universal-access-alt',

        category: 'layout',

        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'p',
            },
            alignment: {
                type: 'string',
            },
        },

        edit: function( props ) {
            var content = props.attributes.content,
                alignment = props.attributes.alignment;

            function onChangeContent( newContent ) {
                props.setAttributes( { content: newContent } );
            }

            function onChangeAlignment( newAlignment ) {
                props.setAttributes( { alignment: newAlignment } );
            }

            return  el(
                        panel,
                        null,
                     
                    );
        },

        save: function( props ) {
            var content = props.attributes.content,
                alignment = props.attributes.alignment;

            return el( RichText.Content, {
                tagName: 'p',
                className: props.className,
                style: { textAlign: alignment },
                value: content
            } );
        },
    } );
} )( window.wp );






