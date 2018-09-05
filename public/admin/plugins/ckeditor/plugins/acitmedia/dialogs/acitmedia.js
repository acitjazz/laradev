CKEDITOR.dialog.add( 'acitmediaDialog', function( editor ) {
    return {
        title: 'Add Media Embed',
        minWidth: 400,
        minHeight: 200,
        contents: [
            {
                id: 'tab-basic',
                label: 'Basic Settings',
                elements: [
                    {
                        type: 'text',
                        id: 'title',
                        label: 'Title',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Title field cannot be empty." )
                    },
                    {
                        type: 'text',
                        id: 'src',
                        label: 'Video Url',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Video Url field cannot be empty." )
                    }
                ]
            },
            {
                id: 'tab-adv',
                label: 'Upload',
                elements: [
                    {
                        type: 'file',
                        id: 'file',
                        label: 'file'
                    }
                ]
            }
        ],
        onOk: function() {
            var dialog = this;

            var acitmedia = editor.document.createElement( 'video' );
            acitmedia.setAttribute( 'src', dialog.getValueOf( 'tab-basic', 'src' ) );
            acitmedia.setAttribute( 'autoplay','true');
            acitmedia.setText( dialog.getValueOf( 'tab-basic', 'title' ) );

            var file = dialog.getValueOf( 'tab-adv', 'file' );
            if ( file )
                acitmedia.setAttribute( 'file', file );
            editor.insertElement( acitmedia );
        }
    };
});
