module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    less: {
      compile: {
        options: {
          compress: true
        },
        files: {
          "static/css/style.css": "less/imports.less"
        }
      }
    },

    watch: {
      css: {
        files: ['less/*.less/', 'less/**/*.less'],
        tasks: ['less'],
        options: {
          spawn: false,
        },
      },

      javascript: {
        files: ['js/*.js/', 'js/**/*.js'],
        tasks: ['uglify'],
        options: {
          spawn: false,
        },
      },
    },

    uglify: {
      options: {
        mangle: true // Specify mangle: false to prevent changes to your variable and function names.
      },
      target: {
        files: {
          'static/js/scripts.min.js': [
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'js/*'
          ]
        }
      }
    }
  });

  // Less compiler
  // $ grunt less
  grunt.loadNpmTasks('grunt-contrib-less');

  // Watch file changes
  // Then compile less
  // $ grunt watch
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Minify javascript files
  // $ grunt uglify
  grunt.loadNpmTasks('grunt-contrib-uglify');
};