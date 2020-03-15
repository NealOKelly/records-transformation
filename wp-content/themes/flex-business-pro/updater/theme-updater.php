<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://www.creativthemes.com', // Site where EDD is hosted
		'item_name'      => 'Flex Business Pro', // Name of theme
		'theme_slug'     => 'flex-business-pro', // Theme slug
		'version'        => '1.3', // The current version of this theme
		'author'         => 'Creativ Themes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'flex-business-pro' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'flex-business-pro' ),
		'license-key'               => __( 'License Key', 'flex-business-pro' ),
		'license-action'            => __( 'License Action', 'flex-business-pro' ),
		'deactivate-license'        => __( 'Deactivate License', 'flex-business-pro' ),
		'activate-license'          => __( 'Activate License', 'flex-business-pro' ),
		'status-unknown'            => __( 'License status is unknown.', 'flex-business-pro' ),
		'renew'                     => __( 'Renew?', 'flex-business-pro' ),
		'unlimited'                 => __( 'unlimited', 'flex-business-pro' ),
		'license-key-is-active'     => __( 'License key is active.', 'flex-business-pro' ),
		'expires%s'                 => __( 'Expires %s.', 'flex-business-pro' ),
		'expires-never'             => __( 'Lifetime License.', 'flex-business-pro' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'flex-business-pro' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'flex-business-pro' ),
		'license-key-expired'       => __( 'License key has expired.', 'flex-business-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'flex-business-pro' ),
		'license-is-inactive'       => __( 'License is inactive.', 'flex-business-pro' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'flex-business-pro' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'flex-business-pro' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'flex-business-pro' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'flex-business-pro' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'flex-business-pro' ),
	)

);
