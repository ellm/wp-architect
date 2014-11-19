'use strict';

module.exports = function(grunt) {
    // Load all tasks
    require('load-grunt-tasks')(grunt);
    // Show elapsed time
    require('time-grunt')(grunt);

    grunt.initConfig({

        //autoprefixer
        autoprefixer: {
          options: {
            browsers: ['Android >= 2.1', 'Chrome >= 21', 'Explorer >= 8', 'Firefox >= 17', 'Opera >= 12.1', 'Safari >= 6.0']
          },
          dist: {
            options: {
              map: {
                prev: 'assets/css/'
              }
            },
            src: 'assets/css/global.css'
          }
        },

        svg2png: {
            all: {
                // specify files in array format with multiple src-dest mapping
                files: [
                    // rasterize all SVG files in "img" and its subdirectories to "img/png"
                    // { src: ['assets/img/**/*.svg'], dest: 'img/png/' },
                    // rasterize SVG file to same directory
                    { src: ['assets/img/*.svg'] }
                ]
            }
        },

        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    require: 'susy'
                },
                files: {
                    'assets/css/global.css': 'assets/scss/global.scss'
                }
            }
        },

        // Minify CSS
        cssmin: {
            options: {
                banner: '/*! Processed <%= grunt.template.today("dddd, mmmm dS, yyyy, h:MM:ss TT") %> */\n'
            },
            combine: {
                files: {
                  'assets/css/global.min.css': ['bower_components/normalize-css/normalize.css','assets/css/global.css'],
                },
            },
        },

        // Uglify/Minification for JS files
        uglify: {
            options: {
                banner: '/*! Processed <%= grunt.template.today("dddd, mmmm dS, yyyy, h:MM:ss TT") %> */\n'
            },
            build: {
                src: ['assets/js/common.js'],
                dest: 'assets/js/common.min.js'
            }
        },

        // Image Minification
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'assets/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'assets/img/'
                }]
            }
        },

        // Modernizr Grunt - custom modernizr build.
        modernizr: {
            build: {
                devFile: 'bower_components/modernizr/modernizr.js',
                outputFile: 'assets/js/modernizr.min.js',
                files : {
                    'src' : [
                        ['assets/scss/*.scss'],
                        ['assets/scss/**/*.scss'],
                        ['assets/js/common.js'],
                        ['assets/js/src/*.js'],
                        ['assets/js/src/**/*.js']
                    ]
                },
                uglify : true,
                parseFiles : true,
            }
        },

        // Watch Task
        watch: {

            options: {
                livereload: true
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

	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks("grunt-modernizr");
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-svg2png');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Register Tasks
    grunt.registerTask('default', [
        'sass',
        'uglify',
        'modernizr',
        'newer:cssmin'
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
