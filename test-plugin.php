<?php
/*
Plugin Name: Test Plugin
Plugin URI: https://github.com/afragen/test-plugin/
Description: This plugin is used for testing functionality of Github updating of plugins.
Version: 0.2
Author: Andy Fragen
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

function my_github_plugin_updater() {

	if ( ! function_exists( 'github_plugin_updater_register' ) )
		return false;

	github_plugin_updater_register( array(
		'owner'	=> 'afragen',
		'repo'	=> 'test-plugin',
		'slug'	=> 'test-plugin/test-plugin.php', // defaults to the repo value ('repo/repo.php')
	) );
}
add_action( 'plugins_loaded', 'my_github_plugin_updater' );