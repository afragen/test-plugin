<?php
/*
Plugin Name: Test Plugin
Plugin URI: https://github.com/afragen/test-plugin/
Description: This plugin is used for testing functionality of Github updating of plugins.
Version: 0.6
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

if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'test-plugin', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/afragen/test-plugin', // the github API url of your github repo
        'raw_url' => 'https://raw.github.com/username/repository-name/master', // the github raw url of your github repo
        'github_url' => 'https://github.com/username/repository-name', // the github url of your github repo
        'zip_url' => 'https://github.com/username/repository-name/zipball/master', // the zip url of the github repo
        'sslverify' => true // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '3.0', // which version of WordPress does your plugin require?
        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '', // Access private repositories by authorizing under Appearance > Github Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}