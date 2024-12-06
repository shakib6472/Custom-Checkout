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
// Hook into plugin activation
register_activation_hook( __FILE__, 's_checkout_activation_function' );

function s_checkout_activation_function() {
    global $wpdb;
    
    // Define the table name
    $table_name = $wpdb->prefix . 's_checkout_sessions';
    
    // Set the character set and collation
    $charset_collate = $wpdb->get_charset_collate();
    
    // SQL query to create the table with all required columns
    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(255) NOT NULL,
        lname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        address TEXT NOT NULL,
        zipcode VARCHAR(10) NOT NULL,
        city VARCHAR(100) NOT NULL,
        state VARCHAR(100) NOT NULL,
        ip_address VARCHAR(100) NOT NULL,
        timestamp DATETIME NOT NULL,
        session_data TEXT,
        advance_data TEXT,
        user_id BIGINT(20) UNSIGNED,
        UNIQUE KEY unique_ip (ip_address, timestamp)
    ) $charset_collate;";
    
    // Include WordPress function to require the necessary db functions
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql ); // Create the table
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

// rest api
// Hook into REST API initialization
add_action( 'rest_api_init', function () {
    // Register the webhook endpoint
    register_rest_route( 's_checkout/v1', '/webhook/', array(
        'methods'  => 'POST',
        'callback' => 's_checkout_webhook_handler',
        'permission_callback' => '__return_true',  // Allow open access (you can secure it later)
    ) );
} );

 
function s_checkout_webhook_handler( $data ) {
    global $wpdb;
  
    // Retrieve the POST parameters (as it's form-urlencoded data)
    $received_data = $data->get_params(); 

    // Ensure the required fields are present in the received data
    if ( ! isset( $received_data['fields']['fname'] ) || 
         ! isset( $received_data['fields']['lname'] ) || 
         ! isset( $received_data['fields']['email'] ) ||
         ! isset( $received_data['fields']['phone'] ) ||
         ! isset( $received_data['fields']['address'] ) ||
         ! isset( $received_data['fields']['zipcode'] ) ||
         ! isset( $received_data['fields']['city'] ) ||
         ! isset( $received_data['fields']['state'] ) ) { 

        return new WP_REST_Response( 'Missing required fields', 400 );
    }

    // Extract the data from the fields
    $fname      = sanitize_text_field( $received_data['fields']['fname']['value'] );
    $lname      = sanitize_text_field( $received_data['fields']['lname']['value'] );
    $email      = sanitize_email( $received_data['fields']['email']['value'] );
    $phone      = sanitize_text_field( $received_data['fields']['phone']['value'] );
    $address    = sanitize_textarea_field( $received_data['fields']['address']['value'] );
    $zipcode    = sanitize_text_field( $received_data['fields']['zipcode']['value'] );
    $city       = sanitize_text_field( $received_data['fields']['city']['value'] );
    $state      = sanitize_text_field( $received_data['fields']['state']['value'] );

    // Get the client's IP address and current timestamp
    $ip_address = $_SERVER['REMOTE_ADDR'];
	
    $timestamp  = current_time( 'mysql' ); // current timestamp in MySQL format

    // Insert the data into the database
    $table_name = $wpdb->prefix . 's_checkout_sessions';
    
    $insert_data = array(
        'fname'      => $fname,
        'lname'      => $lname,
        'email'      => $email,
        'phone'      => $phone,
        'address'    => $address,
        'zipcode'    => $zipcode,
        'city'       => $city,
        'state'      => $state,
        'ip_address' => $ip_address,
        'timestamp'  => $timestamp,
    ); 

    // Insert the data into the database
    $wpdb->insert( $table_name, $insert_data ); 

    // Return a success response
    return new WP_REST_Response( 'Data stored successfully', 200 );
}
