(function(blocks,element,editor){
var el = element.createElement,
registerBlockType = blocks.registerBlockType,
RichText = editor.RichText;

registerBlockType( 'gutenberg-nb-blocks/step-02', {
    title: 'Step 2',

    icon: 'universal-access-alt',

    category: 'layout',

    attributes: {
        content: {
            // type: 'string',
            // source: 'html',
            // selector: 'p',
            type: 'array',
            source: 'children',
            selector: 'p',
        }
    },

    edit: function(props) {
       var content = props.attributes.content;

       function onChangeContent( newContent) {
            props.setAttributes({content: newContent});
       }

       return el(
           RichText,
           {
               tagName: 'p',
               className: props.className,
               onChange: onChangeContent,
               value: content,
           }
       );
    },

    save: function(props) {
        var content = props.attributes.content;

        return el(
            RichText.Content, {
                tagName: 'p',
                value: content
            }
        );
    },
} );
}(window.wp.blocks,
    window.wp.element,
    window.wp.editor));