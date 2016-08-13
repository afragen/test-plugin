<?php
/**
 * Plugin Name: Test Plugin
 * Plugin URI: https://github.com/afragen/test-plugin/
 * Description: This plugin is used for testing functionality of Github updating of plugins.
 * Version: 0.8.0
 * Author: Andy Fragen
 * License: GNU General Public License v2
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * GitHub Plugin URI: afragen/test-plugin/
 * GitHub Branch: admin-notice-dismissal
 */

$extra_classes = array(
	'PAnD' => __DIR__ . '/vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php',
);

// Load Autoloader
require_once( __DIR__ . '/vendor/Autoloader.php' );
$loader = '\\Fragen\\my_plugin\\Autoloader';
new $loader( array(), $extra_classes );

//include __DIR__ . '/vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';

function sample_admin_notice__success1() {
	if ( ! PAnD::is_admin_notice_active( 'test-plugin-notice-1' ) ) {
		echo ' skipped-test-plugin ';

		return;
	}

	?>
	<div data-dismissible="test-plugin-notice-1" class="updated notice notice-success is-dismissible">
		<p><?php _e( 'Done 1!', 'sample-text-domain' ); ?></p>
	</div>
	<?php
}

add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'sample_admin_notice__success1' );
add_action( 'network_admin_notices', 'sample_admin_notice__success1' );
