<?php
/**
 * Plugin Name: EDD Graph Dashboard Widget
 * Description:
 * Author: Nikhil Vimal
 * Author URI: http://nik.techvoltz.com
 * Version: 1.0
 * Plugin URI:
 * License: GNU GPLv2+
 */

class EDD_Graph_Dash_Widget {

	public function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'dashboard_widget' ));
	}

	/**
	 * Register the dashboard widget
	 */
	public function dashboard_widget() {
		wp_add_dashboard_widget(
			'edd_graph_dashboard_widget',         // Widget slug.
			'Download Graph',         // Champion Title.
			array( $this, 'dash_widget_callback' ) // Roundhouse kick that function to another line.
		);
	}


	/**
	 * The simple widget callback
	 */
	public function dash_widget_callback() {

		return edd_reports_graph();

	}


}
function edd_graph_widget_check_edd() {
	if( ! class_exists( 'Easy_Digital_Downloads' ) ) {

		new EDD_Graph_Dash_Widget();
	}
}
