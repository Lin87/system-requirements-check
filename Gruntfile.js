module.exports = function( grunt ) {

	'use strict';

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
		
	} );

	grunt.loadNpmTasks( 'grunt-wp-readme-to-markdown' );
    grunt.registerTask( 'default', ['wp_readme_to_markdown'] );

	grunt.util.linefeed = '\n';

};