# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).
See also [Keep A Change Log](http://keepachangelog.com/)

## [Unreleased][unreleased]
For release 2.0 (to be rewritten) 
New and Improved; Lightweight & Scalable Sketelton Theme for WordPress.
Features: Preprocessing & Boilerplate Code.
Informed by: HTML5bp and _S
###TODO
- Code Clean Up
	- Change - Clean up commenting / Remove bulky senseless code comments
	- Change - Move PHP functions to a new repository (Snippets Library)
	- Change - Restructure SCSS folder directory; Make it WordPress focused.
	- Update - screenshot.png to blank image with instructions (correct image size / client name)
	- Update - Header.php new title function
	- Add - Styles and Scripts - Scalable way to test for WP_DEBUG and switch between dev and prod environments.
	- Chnage - Remove localation for languages? (is it necessary?) 
- Changes to Grunt.js
	- Add - LibSass Support; Update Susy
	- Change - Revert back to single Grunt Task / Run all via 'Watch'
	- Change - Compile SASS to style.css file in Root (Cuts down extra HTTP Request)
	- Change - Minify all JS into single file? (Plugins, Common); Keep page specific separated / make inline?
- Remove IE 7 Support
	- Remove - Conditional statements surrounding doctype
	- Remove - Selectivizr
- Remove Bower Dependency 
	- Change - Move Modernizr and Normalize CSS out of build process and into project repo (to be manually updated).
	- Change - Replace Breakpoint SASS with a custom mixin

### Fixed
- Example: Fix Markdown links to tag comparison URL with footnote-style links.
