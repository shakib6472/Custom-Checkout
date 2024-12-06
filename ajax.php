<?php
require __DIR__ . "/vendor/autoload.php";


function add_new_order_for_this_bottole($price_per_product, $package, $delivery)
{
    // Get the user's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Create a new WooCommerce order
    $order = wc_create_order();

    // Get the product
    $product_id = 928; // Replace with actual product ID
    $product = wc_get_product($product_id);

    // Check if the product exists
    if ($product) {
        // Set the custom price for the product
        $product->set_price($price_per_product);

        // Add the product to the order with the custom price and quantity
        $order->add_product($product, $package);

        // Add custom meta data for delivery type
        $order->add_meta_data('Delivery', $delivery);

        // Retrieve additional data based on the IP address from the database
        $order_meta = get_order_meta_from_ip($ip_address);

        if ($order_meta) {
            // Format the retrieved data as a single text string
            $formatted_order_meta = format_order_meta($order_meta);

            // Add the formatted text as an order note
            $order->add_order_note($formatted_order_meta);
        }  
    }

    // Set payment method to COD
    $order->set_payment_method('cod');

    // Set order status to paid (you can set it to 'pending' as per your requirement)
    $order->set_status('paid');

    // Save the order
    $order->save();

    return true;
}
/**
 * Function to retrieve order meta based on IP address from the database
 */
function get_order_meta_from_ip($ip_address)
{
    global $wpdb;

    // Query the database for the session data associated with the given IP address
    $table_name = $wpdb->prefix . 's_checkout_sessions';

    // Prepare the SQL query to get the data
    $query = $wpdb->prepare(
        "SELECT * FROM $table_name WHERE ip_address = %s ORDER BY session_time DESC LIMIT 1",
        $ip_address
    );

    // Execute the query
    $results = $wpdb->get_row($query, ARRAY_A);

    if ($results) {
        // Prepare the data to return
        $order_meta = array(
            'First Name' => $results['fname'],
            'Last Name' => $results['lname'],
            'Email' => $results['email'],
            'Phone' => $results['phone'],
            'Address' => $results['address'],
            'Zip Code' => $results['zipcode'],
            'City' => $results['city'],
            'State' => $results['state'],
            'IP Address' => $results['ip_address'],
            'Timestamp' => $results['session_time']
        );

        // Now delete the session data from the database
        $wpdb->delete($table_name, array('ip_address' => $ip_address), array('%s'));

        return $order_meta;
    } else {
        // If no session data is found for this IP address, return null
        return null;
    }
}
 
/**
 * Function to format the order meta data as a single text string
 */
function format_order_meta($order_meta)
{
    $formatted_text = "Order Details Based on IP Address:\n";

    // Loop through each key-value pair and format it
    foreach ($order_meta as $key => $value) {
        $formatted_text .= $key . ": " . $value . "\n";
    }

    return $formatted_text;
}
 
function process_stripe_payment()
{
    // Retrieve card details from the AJAX request
    $token = sanitize_text_field($_POST['token']);
    $amount = sanitize_text_field($_POST['amount']);
    $package = isset($_POST['package']) ? intval($_POST['package']) : 0;
    $delivery = isset($_POST['deliveryValue']) ? sanitize_text_field($_POST['deliveryValue']) : '';

    // Define prices based on quantity
    $price_per_product = 59; // Default price for 1 product
    $total_price = $price_per_product * 1; // Default price for 1 product
    if ($package == 2) {
        $price_per_product = 41.33;
        $total_price = $price_per_product * 2; // Default price for 1 product
    } elseif ($package == 3) {
        $price_per_product = 38.33;
        $total_price = $price_per_product * 3; // Default price for 1 product
    }
    // Stripe API Key
    $stripe_secret_key = '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';
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    try {
        // Create a charge with the token
        $charge = \Stripe\Charge::create([
            'amount' => $total_price * 100,
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Payment for Order',
        ]);
        $order = add_new_order_for_this_bottole($price_per_product, $package, $delivery);
        // Success response
        if ($order) {
            wp_send_json_success([
                'message' => 'Payment successful!',
                'charge_id' => $charge->id
            ]);
        }
    } catch (\Stripe\Exception\CardException $e) {
        // Error response
        wp_send_json_error(['message' => 'Payment failed: ' . $e->getError()->message]);
    }
    wp_die(); // Required to end AJAX request properly
}

add_action('wp_ajax_process_stripe_payment', 'process_stripe_payment');
add_action('wp_ajax_nopriv_process_stripe_payment', 'process_stripe_payment');
