=== Less PHP Compiler ===
Contributors: aristath, fovoc
Tags: less, compiler, preprocessor
Requires at least: 3.7
Tested up to: 3.8.1
Stable tag: 1.7.0
License: GPLv2 or later

Includes the less.php preprocessor so that it may be used by other plugins or themes.

== Description ==

This is a simple plugin that loads the Less.PHP class and makes it available to other plugins and themes.
When activated this plugin will not do anything.
It has no functionality on its own, but can be used as a dependency for other plugins & themes.

Includes the Less.php class from http://lessphp.gpeasy.com/


== Changelog ==

= 1.7.0 =

* Compilation compatible with LESS 1.7
* Fix sourcemap generation when parser caching used
* Additional less.inc.php functionality
* Assetic compatibility
* Fix order of classes in combined file

= 1.6.3 =

* Added fixes and updates from less.js 1.6.3
* Performance enhancements
* Improved Windows compatibility
* Additional lessc.inc.php functionality for users transitioning from leafo/lessphp

= 1.6.1 =

* Less compilation compatible with less css 1.6.1

= 1.5.1.2 =

* Initial Release
