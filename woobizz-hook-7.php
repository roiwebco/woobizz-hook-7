<?php
/*
Plugin Name: Woobizz Hook 7
Plugin URI: http://woobizz.com
Description: Add widget content after shipping form on checkout page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
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
//Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	//echo "woocommerce is active";
	 add_action( 'widgets_init', 'woobizzhook7_widget',107);
}else{
	//Show message on admin
	//echo "woocommerce is not active";
	add_action( 'admin_notices', 'woobizzhook7_admin_notice' );
}
//Add Hook 7
function woobizzhook7_widget() {
	$args = array(
				'id'            => 'woobizzhook7_id',
				'name'          => __( 'Woobizz Hook 7', 'woobizzhook7' ),
				'description'   => __( 'Add widget content after shipping form on checkout page','woobizzhook7' ),
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
//Hook1 Notice
function woobizzhook7_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Woobizz Hook 7 needs WooCommerce to work properly, If you do not use this plugin you can disable it!', 'woobizzhook7' ); ?></p>
    </div>
    <?php
}