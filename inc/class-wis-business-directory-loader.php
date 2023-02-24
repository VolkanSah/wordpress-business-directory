<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       http://wordpress-webmaster.de
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/includes
 */

/**
 * Register all actions and filters for the plugin. See below function
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/includes
 * @author     Volkan Kücükbudak <plugins@wasistseo.de>
 */
class Wis_Business_Directory_Loader {

	protected $actions;
	protected $filters;
	protected $shortcodes;
	public function __construct() {

		$this->actions = array();
		$this->filters = array();
		$this->shortcodes = array();

	}
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}
	public function add_shortcode( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->shortcodes = $this->add( $this->shortcodes, $hook, $component, $callback, $priority, $accepted_args );
	}
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);
		return $hooks;
	}
	public function run() {
		// run filters
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		// run actions
		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		// run shortcodes
		foreach ( $this->shortcodes as $hook ) {
			add_shortcode( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		// example do actions shortcodes
		/* foreach ( $this->shortcodes as $hook ) {
			do_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}*/
	}
}
