<?php
/*
Plugin Name: wpWhoops
Plugin URI: https://github.com/Rarst/wps
Description: WordPress plugin for Whoops error handler (previously wps).
Author: Andrey "Rarst" Savchenko
Version: 1.3.3
Author URI: http://www.rarst.net/
License: MIT

Copyright (c) 2013 Andrey "Rarst" Savchenko

Permission is hereby granted, free of charge, to any person obtaining a copy of this
software and associated documentation files (the "Software"), to deal in the Software
without restriction, including without limitation the rights to use, copy, modify, merge,
publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons
to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies
or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.
*/
add_action('plugins_loaded', function() {
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}

	if ( isset( $_GET['wps_disable'] ) ) {
		return;
	}

	$wps = new \Rarst\wps\Plugin();
	$wps->run();

	//We want all deprecated logging in non-PROD envs, but there's no need to display blocking errors
	$wps['run']->silenceErrorsInPaths('~.*~', E_DEPRECATED);
});