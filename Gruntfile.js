'use strict';

module.exports = function(grunt) {
    // Show elapsed time
    // require('time-grunt')(grunt);

    grunt.initConfig({
    	pkg: grunt.file.readJSON('package.json'),

        //
        sass: {
	        options: {
	        	require: 'susy',
	            sourceMap: true,
				outputStyle: 'compressed'
	        },
            dev: {
                files: {
                    'assets/css/global.css': 'assets/scss/global.scss'
                }
            }
        },

        // Watch Task
        watch: {

            options: {
                livereload: true,
                nospawn: true
            },

            html: {
                files: ['*.php']
            },

            img: {
                files: ['assets/img/*.svg'],
                tasks: ['svg2png'],
            },

            sass: {
                files: ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
                tasks: ['sass'],
            },
        }
    });

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-contrib-watch');

    // Register Tasks
    grunt.registerTask('default', [
        'sass'
    ]);

    grunt.registerTask('dev', [
        'watch'
    ]);

    grunt.registerTask('dist', [
    	'sass',
        'newer:autoprefixer:dist',
        'newer:cssmin',
        'uglify',
        'modernizr',
        'newer:imagemin',
        'newer:svg2png'
    ]);
};
