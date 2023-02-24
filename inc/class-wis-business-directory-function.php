<?php
/**
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/includes
 */
 /* Do not need much more heavy plugins!  Your own external & clean function.php. 
 Register your functions in class-wis-business-directory.php see below*/
class Wis_Business_Directory_Tools {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		}
	/* cleanup dashboard - oldschool style :D uncoment needed
	public function wis_bd_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
	*/

	/* your functions start here */
	
	
	/* your functions end here */
	// end class
}
