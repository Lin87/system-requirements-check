module.exports = function( grunt ) {

	'use strict';

	const sass = require( 'sass' );

	// Project configuration
	grunt.initConfig( {

		pkg: grunt.file.readJSON( 'package.json' ),

		wp_readme_to_markdown: {
			your_target: {
				files: {
					'README.md': 'readme.txt'
				},
				options: {
					screenshot_url: '.wordpress-org/{screenshot}.png',
					pre_convert: function( readme ) {
						readme = readme.replace( new RegExp('^`$[\n\r]+([^`]*)[\n\r]+^`$','gm'), function( codeblock, codeblockContents ) {
							const blockStartEnd = '```';
							let lines = codeblockContents.split('\n');
							if ( String( lines[0] ).startsWith('<?php') ) {
								return `${blockStartEnd}php\n${lines.join('\n')}\n${blockStartEnd}`;
							}
						});
						return readme;
					},
					post_convert: function( readme ) {
						readme = readme.replace( /^\*\*([^*\s][^*]*)\*\*$/gm, function( a, b ) {
							return `#### ${b} ####`;
						});
						readme = readme.replace( /^\*([^*\s][^*]*)\*$/gm, function( a, b ) {
							return `##### ${b} #####`;
						});
						return readme;
					}
				}
			},
		},

		sass: {
			options: {
				sourceMap: false,
				implementation: sass
			},
			dist: {
				files: {
					'public/css/system-requirements-check-frontend.css': 'src/scss/system-requirements-check-frontend.scss',
					'admin/css/system-requirements-check-settings.css': 'src/scss/system-requirements-check-settings.scss'
				}
			}
		},
		
	} );

	grunt.loadNpmTasks( 'grunt-wp-readme-to-markdown' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.registerTask( 'default', ['build'] );
	grunt.registerTask( 'build', [ 'readme', 'sass' ] );
    grunt.registerTask( 'readme', ['wp_readme_to_markdown'] );

	grunt.util.linefeed = '\n';

};