/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/**
 * @fileOverview The Video plugin.
 */

( function() {

	CKEDITOR.plugins.add( 'video', {
		requires: 'dialog',
		// jscs:disable maximumLineLength
		lang: 'af,ar,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn', // %REMOVE_LINE_CORE%
		// jscs:enable maximumLineLength
		icons: 'video', // %REMOVE_LINE_CORE%
		hidpi: true, // %REMOVE_LINE_CORE%
		init: function( editor ) {
			// Abort when Video2 is to be loaded since both plugins
			// share the same button, command, etc. names (#11222).
			if ( editor.plugins.video2 )
				return;

			var pluginName = 'video';

			// Register the dialog.
			CKEDITOR.dialog.add( pluginName, this.path + 'dialogs/video.js' );

			var allowed = 'video[alt,!src,controls]{controls,border-style,border-width,float,height,margin,margin-bottom,margin-left,margin-right,margin-top,width}',
				required = 'video[alt,src,controls]';

			if ( CKEDITOR.dialog.isTabEnabled( editor, pluginName, 'advanced' ) )
				allowed = 'video[controls,alt,dir,id,lang,longdesc,!src,title]{*}(*)';

			// Register the command.
			editor.addCommand( pluginName, new CKEDITOR.dialogCommand( pluginName, {
				allowedContent: allowed,
				requiredContent: required,
				contentTransformations: [
					[ 'video{width}: sizeToStyle', 'video[width]: sizeToAttribute' ],
					[ 'video{float}: alignmentToStyle', 'video[align]: alignmentToAttribute' ]
				]
			} ) );

			// Register the toolbar button.
			editor.ui.addButton && editor.ui.addButton( 'Video', {
				label: editor.lang.common.video,
				command: pluginName,
				toolbar: 'insert,10'
			} );

			editor.on( 'doubleclick', function( evt ) {
				var element = evt.data.element;

				if ( element.is( 'video' ) && !element.data( 'cke-realelement' ) && !element.isReadOnly() )
					evt.data.dialog = 'video';
			} );

			// If the "menu" plugin is loaded, register the menu items.
			if ( editor.addMenuItems ) {
				editor.addMenuItems( {
					video: {
						label: editor.lang.image.menu,
						command: 'image',
						group: 'image'
					}
				} );
			}

			// If the "contextmenu" plugin is loaded, register the listeners.
			if ( editor.contextMenu ) {
				editor.contextMenu.addListener( function( element ) {
					if ( getSelectedVideo( editor, element ) )
						return { video: CKEDITOR.TRISTATE_OFF };
				} );
			}
		},
		afterInit: function( editor ) {
			// Abort when Video2 is to be loaded since both plugins
			// share the same button, command, etc. names (#11222).
			if ( editor.plugins.video2 )
				return;

			// Customize the behavior of the alignment commands. (#7430)
			setupAlignCommand( 'left' );
			setupAlignCommand( 'right' );
			setupAlignCommand( 'center' );
			setupAlignCommand( 'block' );

			function setupAlignCommand( value ) {
				var command = editor.getCommand( 'justify' + value );
				if ( command ) {
					if ( value == 'left' || value == 'right' ) {
						command.on( 'exec', function( evt ) {
							var img = getSelectedVideo( editor ),
								align;
							if ( img ) {
								align = getVideoAlignment( img );
								if ( align == value ) {
									img.removeStyle( 'float' );

									// Remove "align" attribute when necessary.
									if ( value == getVideoAlignment( img ) )
										img.removeAttribute( 'align' );
								} else {
									img.setStyle( 'float', value );
								}

								evt.cancel();
							}
						} );
					}

					command.on( 'refresh', function( evt ) {
						var img = getSelectedVideo( editor ),
							align;
						if ( img ) {
							align = getVideoAlignment( img );

							this.setState(
							( align == value ) ? CKEDITOR.TRISTATE_ON : ( value == 'right' || value == 'left' ) ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_DISABLED );

							evt.cancel();
						}
					} );
				}
			}
		}
	} );

	function getSelectedVideo( editor, element ) {
		if ( !element ) {
			var sel = editor.getSelection();
			element = sel.getSelectedElement();
		}

		if ( element && element.is( 'video' ) && !element.data( 'cke-realelement' ) && !element.isReadOnly() )
			return element;
	}

	function getVideoAlignment( element ) {
		var align = element.getStyle( 'float' );

		if ( align == 'inherit' || align == 'none' )
			align = 0;

		if ( !align )
			align = element.getAttribute( 'align' );

		return align;
	}

} )();

/**
 * Determines whether dimension inputs should be automatically filled when the video URL changes in the Video plugin dialog window.
 *
 *		config.video_prefillDimensions = false;
 *
 * @since 4.5
 * @cfg {Boolean} [video_prefillDimensions=true]
 * @member CKEDITOR.config
 */

/**
 * Whether to remove links when emptying the link URL field in the Video dialog window.
 *
 *		config.video_removeLinkByEmptyURL = false;
 *
 * @cfg {Boolean} [video_removeLinkByEmptyURL=true]
 * @member CKEDITOR.config
 */
CKEDITOR.config.video_removeLinkByEmptyURL = true;

/**
 * Padding text to set off the video in the preview area.
 *
 *		config.video_previewText = CKEDITOR.tools.repeat( '___ ', 100 );
 *
 * @cfg {String} [video_previewText='Lorem ipsum dolor...' (placeholder text)]
 * @member CKEDITOR.config
 */
