module.exports = function (grunt) {
  'use strict';

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    wp_readme_to_markdown: {
      your_target: {
        files: { 'README.md': 'readme.txt' },
        options: {
          screenshot_url: '.wordpress-org/{screenshot}.png',
          pre_convert: function (readme) {
            readme = readme.replace(
              new RegExp('^`$[\n\r]+([^`]*)[\n\r]+^`$', 'gm'),
              function (codeblock, codeblockContents) {
                const blockStartEnd = '```';
                let lines = codeblockContents.split('\n');
                if (String(lines[0]).startsWith('<?php')) {
                  return `${blockStartEnd}php\n${lines.join('\n')}\n${blockStartEnd}`;
                }
              }
            );
            return readme;
          },
          post_convert: function (readme) {
            readme = readme.replace(/^\*\*([^*\s][^*]*)\*\*$/gm, (a, b) => {
              return `#### ${b} ####`;
            });
            readme = readme.replace(/^\*([^*\s][^*]*)\*$/gm, (a, b) => {
              return `##### ${b} #####`;
            });
            return readme;
          },
        },
      },
    },

    shell: {
      css_frontend: {
        command:
          "npx postcss src/css/system-requirements-check-frontend.css -o public/css/system-requirements-check-frontend.css",
      },
      css_admin: {
        command:
          "npx postcss src/css/system-requirements-check-settings.css -o admin/css/system-requirements-check-settings.css",
      },
    },
  });

  grunt.loadNpmTasks('grunt-wp-readme-to-markdown');
  grunt.loadNpmTasks('grunt-shell');

  grunt.registerTask('default', ['build']);
  grunt.registerTask('build', ['readme', 'css']);
  grunt.registerTask('readme', ['wp_readme_to_markdown']);
  grunt.registerTask('css', ['shell:css_frontend', 'shell:css_admin']);

  grunt.util.linefeed = '\n';
};