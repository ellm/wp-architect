#wp-architect
============
###Just Another Boilerplate for Crafting Custom WordPress Themes

##Uses:
* [npm](https://www.npmjs.org/)
* [Grunt](http://gruntjs.com/)
* [Bower](http://bower.io/)
* [Susy Grid Framework](http://susy.oddbird.net/) 
* [Breakpoint](https://github.com/at-import/breakpoint) Media Queries 
* [Normalize.CSS](http://necolas.github.io/normalize.css/)
* [Modernizr](http://modernizr.com/)
 
##Quick Start:
* `npm install` - Install development package via NPM
* `grunt` - Set Up...
* `grunt dev` - Get Developing...
* `grunt dist` - Ship!

##References:
Lots of help from:
* [Themeshaper](http://themeshaper.com/2012/10/22/the-themeshaper-wordpress-theme-tutorial-2nd-edition/)
* [Bones](http://themble.com/bones/)
* [_s](https://github.com/Automattic/_s)
* [html5bp](http://html5boilerplate.com/)

##Change Log:
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).
See also [Keep A Change Log](http://keepachangelog.com/)

## [Unreleased][unreleased]
###TODO
- Code Clean Up
	- Change - Move PHP functions to a new repository (Snippets Library)
	- Chnage - Remove localation for languages? (is it necessary?) 
- Changes to Grunt.js
	- Change - Compile SASS to style.css file in Root (Cuts down extra HTTP Request)
	- Change - Minify all JS into single file? (Plugins, Common); Keep page specific separated / make inline?
- Remove Bower Dependency 
	- Change - Replace Breakpoint SASS with a custom mixin

## [2.0][2015_02_12]
For release 2.0
New and Improved; Lightweight & Scalable Sketelton Theme for WordPress.
Features: Preprocessing & Boilerplate Code.
Informed by: HTML5bp and _S

- Code Clean Up
	- Change - Clean up commenting / Remove bulky senseless code comments
	- Change - Restructure SCSS folder directory; Make it WordPress focused
	- Update - screenshot.png to blank image with instructions (correct image size / client name)
	- Update - Header.php new title function
	- Add - Styles and Scripts - Scalable way to test for WP_DEBUG and switch between dev and prod environments.
- Template files 
	- Update header.php
		- Remove IE 7 Support
			- Remove - Conditional statements surrounding doctype
			- Remove - Selectivizr
	- Update footer.php
	- Update sidebar.php
	- Update content.php
	- Update comments.php
	- Update index.php
	- Update page.php
	- Update page-full-width.php
	- Delete 404.php
	- Delete Search.php
		- Default to index.php instead
- Functions
	- Add register.php for functions that register
	- Update theme-support.php
	- Update scripts-styles.php
	- Delete custom-post-types.php
	- Update snippets.php
- SCSS
	- Delete Dropdown Menu
	- Delete Buttons
	- Rename Various
	- Clean up various
- Changes to Grunt.js
	- Add - LibSass Support; Update Susy
	- Change - Revert back to single Grunt Task / Run all via 'Watch'
- Remove Bower Dependency 
	- Change - Move Modernizr and Normalize CSS out of build process and into project repo (to be manually updated).
- Functions
	- Added wp_arch_footer_meta() used in content.php

### Fixed
- Example: Fix Markdown links to tag comparison URL with footnote-style links.

