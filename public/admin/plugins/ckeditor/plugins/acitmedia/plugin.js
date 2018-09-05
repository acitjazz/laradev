CKEDITOR.plugins.add( 'acitmedia', {
    icons: 'acitmedia',
    init: function( editor ) {
        editor.addCommand( 'acitmedia', new CKEDITOR.dialogCommand( 'acitmediaDialog' ) );
        editor.ui.addButton( 'Acitmedia', {
            label: 'Insert Media',
            command: 'acitmedia',
            toolbar: 'insert'
        });

        CKEDITOR.dialog.add( 'acitmediaDialog', this.path + 'dialogs/acitmedia.js' );
    }
});
