(function () {

    'use strict';

    module.exports = function (grunt) {

        grunt.initConfig({
            pkg: grunt.file.readJSON('package.json'),

            // Sass
            sass: {
                options: {
                    require: 'susy',
                    sourceMap: true,
                    outputStyle: 'nested'
                },
                dev: {
                    files: {
                        'assets/css/global.css': 'assets/scss/global.scss'
                    }
                }
            },

            // Autoprefixer
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

            // Svg
            svg2png: {
                all: {
                    files: [
                        // rasterize SVG file to same directory
                        {src: ['assets/img/*.svg']}
                    ]
                }
            },

            // Minify CSS
            cssmin: {
                options: {
                    banner: '/*! Processed <%= grunt.template.today("dddd, mmmm dS, yyyy, h:MM:ss TT") %> */\n'
                },
                combine: {
                    files: {
                        'assets/css/global.min.css': ['assets/css/global.css'],
                    },
                },
            },

            //Uglify/Minification for JS files
            uglify: {
                options: {
                    banner: '/*! Processed <%= grunt.template.today("dddd, mmmm dS, yyyy, h:MM:ss TT") %> */\n'
                },
                build: {
                    src: ['assets/js/common.js'],
                    dest: 'assets/js/min/common.min.js'
                }
            },

            // Modernizr Grunt - custom modernizr build.
            modernizr: {
                build: {
                    devFile: 'assets/js/modernizr.js',
                    outputFile: 'assets/js/min/modernizr.prod.min.js',
                    files: {
                        'src': [
                            ['assets/scss/*.scss'],
                            ['assets/scss/**/*.scss'],
                            ['assets/js/common.js'],
                            ['assets/js/src/*.js'],
                            ['assets/js/src/**/*.js']
                        ]
                    },
                    uglify: true,
                    parseFiles: true,
                }
            },

            // Clean
            clean: ['assets/img/min/'],

            // Imagemin - minify images (gifsicle, jpegtran, optipng, svgo)
            imagemin: {
                dynamic: {
                    files: [{
                        expand: true,                  		// Enable dynamic expansion
                        cwd: 'assets/img/',            		// Src matches are relative to this path
                        src: ['**/*.{png,jpg,gif,svg}'],   	// Actual patterns to match
                        dest: 'assets/img/min/'       		// Destination path prefix
                    }]
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

                js: {
                    files: ['assets/js/*.js'],
                    tasks: ['modernizr', 'uglify']
                },

                img: {
                    files: ['assets/img/*.svg'],
                    tasks: ['newer:svg2png', 'newer:imagemin'],
                },

                sass: {
                    files: ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
                    tasks: ['sass', 'newer:autoprefixer:dist', 'newer:cssmin'],
                },
            }
        });

        grunt.loadNpmTasks('grunt-sass');
        grunt.loadNpmTasks('grunt-newer');
        grunt.loadNpmTasks('grunt-contrib-watch');
        grunt.loadNpmTasks('grunt-autoprefixer');
        grunt.loadNpmTasks("grunt-modernizr");
        grunt.loadNpmTasks('grunt-contrib-uglify');
        grunt.loadNpmTasks('grunt-newer');
        grunt.loadNpmTasks('grunt-svg2png');
        grunt.loadNpmTasks('grunt-contrib-cssmin');
        grunt.loadNpmTasks('grunt-contrib-clean');
        grunt.loadNpmTasks('grunt-contrib-imagemin');

        // Register Tasks
        grunt.registerTask('default', [
            'clean',
            'sass',
            'newer:autoprefixer:dist',
            'newer:cssmin',
            'uglify',
            'modernizr',
            'newer:svg2png',
            'imagemin'
        ]);

        grunt.registerTask('dev', [
            'watch'
        ]);
    };

})();
