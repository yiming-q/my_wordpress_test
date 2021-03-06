<?php

require_once './includes/functions.php';

function _manually_load_environment() {

	// Add your theme
	switch_theme('twentysixteen');

	// Update array with plugins to include ...
	$plugins_to_active = array(
		'REANews-rest-api/plugin.php',
		'Basic-Auth-master/basic-auth.php',
		'test-plugin/test-plugin.php'
	);

	update_option( 'active_plugins', $plugins_to_active );

}
tests_add_filter( 'muplugins_loaded', '_manually_load_environment' );

require './includes/bootstrap.php';
