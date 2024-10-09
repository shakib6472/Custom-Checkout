<?php /*
  * Plugin Name:       S-Checkout Core
  * Plugin URI:        https://facebook.com/shakib6472/
  * Description:       This is the s-checkout websites Custom Plugin. All features are came from here.
  * Version:           2.1.2
  * Requires at least: 5.2
  * Requires PHP:      7.2
  * Author:            Shakib Shown
  * Author URI:        https://facebook.com/shakib6472/
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  * Text Domain:       s-checkout
  * Domain Path:       /languages
  */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
//requir Files
// Include Composer's autoload file
require_once __DIR__ . '/vendor/autoload.php';
// Set your Stripe secret key
$stripe_secrete_key = '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';
\Stripe\Stripe::setApiKey($stripe_secrete_key);


$plugin_url = plugin_dir_path(__FILE__);
require_once($plugin_url . 'ajax.php');

function s_checkout_enqueue_scripts()
{
	//css
	wp_enqueue_style('s-checkout-style', plugin_dir_url(__FILE__) . '/assets/order.css');
	wp_enqueue_style('s-checkout-slick-style', plugin_dir_url(__FILE__) . '/assets/slick.css');
	wp_enqueue_style('s-checkout-slick-theme-style', plugin_dir_url(__FILE__) . '/assets/slick-theme.css');

	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('s-checkout-stripe-script','https://js.stripe.com/v3/', array(), null, true);
	wp_enqueue_script('s-checkout-script', plugin_dir_url(__FILE__) . 'assets/order.js', array('jquery'), null, true);
	wp_enqueue_script('s-checkout-slick-min-script', plugin_dir_url(__FILE__) . 'assets/slick.min.js', array('jquery'), null, true);

	// Localize the script with new data
	wp_localize_script('s-checkout-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'hone_url' => home_url(),
		'thank_you' => home_url('/thank-you'),
		// Add other variables you want to pass to your script here
	));
}

add_action('wp_enqueue_scripts', 's_checkout_enqueue_scripts');
//Elementor Setup
function elementor_s_checkout_widgets($widgets_manager)
{

	require_once(__DIR__ . '/elementor/checkout.php');
	require_once(__DIR__ . '/elementor/checkout_old.php');
	require_once(__DIR__ . '/elementor/s-popup.php');
	require_once(__DIR__ . '/elementor/checkout_mob.php');

	$widgets_manager->register(new \Elementor_s_checkout());
	$widgets_manager->register(new \Elementor_s_checkouts());
	$widgets_manager->register(new \Elementor_s_checkout_mob());
	$widgets_manager->register(new \Elementor_s_popup());

}
add_action('elementor/widgets/register', 'elementor_s_checkout_widgets');



// Activation function
function s_checkout_activation_function()
{
	// Your activation code here
	// For example, create database tables or set default options
}

// Deactivation function
function s_checkout_deactivation_function()
{
	// Your deactivation code here
	// For example, delete database tables or clean up options
}


// Activation Hook
register_activation_hook(__FILE__, 's_checkout_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 's_checkout_deactivation_function');

//Ajax
function add_to_cart_this_product()
{
	// Check if product ID is set and valid
	if (!isset($_POST['product_id']) || !is_numeric($_POST['product_id'])) {
		wp_send_json_error(array('message' => 'Invalid product ID.'));
		return;
	}

	$product_id = intval($_POST['product_id']);
	$quantity = 10; // Set the quantity to 10

	// Add the product to the cart
	$added = WC()->cart->add_to_cart($product_id, $quantity);

	if ($added) {
		wp_send_json_success(array('message' => 'Product added to cart successfully.'));
	} else {
		wp_send_json_error(array('message' => 'Failed to add product to cart.'));
	}

	wp_die(); // Always include this to terminate the script
}
add_action('wp_ajax_add_to_cart_this_product', 'add_to_cart_this_product');
add_action('wp_ajax_nopriv_add_to_cart_this_product', 'add_to_cart_this_product');



