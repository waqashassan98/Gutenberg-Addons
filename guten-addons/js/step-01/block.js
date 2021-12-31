// var el = wp.element.createElement,
//     registerBlockType = wp.blocks.registerBlockType;
    
    //blockStyle = { backgroundColor: '#900', color: '#fff', padding: '20px' };


    wp.blocks.registerBlockType( 'gutenberg-nb-blocks/step-01', {
    title: 'Hello Step 1',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function(props) {
        return wp.element.createElement( 'p', { className: props.className }, 'Hello editor.' );
    },

    save: function() {
        return wp.element.createElement( 'p', { }, 'Hello saved content.' );
    },
} );
