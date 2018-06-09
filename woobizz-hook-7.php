<?php
/*
Plugin Name: Woobizz Hook 7
Plugin URI: http://woobizz.com
Description: Add content after shipping form on checkout page
Author: WOOBIZZ.COM
Author URI: http://woobizz.com
Version: 1.0.1
Text Domain: woobizzhook7
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook7_load_textdomain' );
function woobizzhook7_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook7', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Add Hook 7
function woobizzhook7_widget() {
	$args = array(
				'id'            => 'woobizzhook7_id',
				'name'          => __( 'Woobizz Hook 7', 'woobizzhook7' ),
				'description'   => __( 'Add content after shipping form on checkout page','woobizzhook7' ),
				'before_title'  => '<h2 class="widgettitle">',
				'before_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'before_widget'  => '</li>',
	);
	register_sidebar( $args );
	add_action( 'woocommerce_checkout_shipping', 'woobizzhook7_display',100);
	function woobizzhook7_display(){
		?>
		<div class="woobizzhook-widget-div">
			<div class="woobizzhook-widget-content">
				<?php dynamic_sidebar( 'Woobizz Hook 7' ); ?>
			</div>
		</div>
		<?php
	}
}
add_action( 'widgets_init', 'woobizzhook7_widget',107);