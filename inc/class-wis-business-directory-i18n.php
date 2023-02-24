<?php
/**
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/includes
 */
// i18n load plugin-domain
class Wis_Business_Directory_i18n {
public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'wis-business-directory',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
