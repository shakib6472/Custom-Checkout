<?php
require __DIR__ . "/vendor/autoload.php";

function add_new_order_for_this_bottole($price_per_product, $package, $delivery)
{
    $product_id = 928;
    // Create a new order
    $order = wc_create_order();
    // Get the product
    $product = wc_get_product($product_id);

    if ($product) {
        // Set the custom price for the product
        $product->set_price($price_per_product);
        // Add the product to the order with the custom price and quantity
        $order->add_product($product, $package);
        // Add custom meta data for delivery type
        $order->add_meta_data('Delivery', $delivery);
    }
    // Set payment method to COD
    $order->set_payment_method('cod');
    // Set order status to pending
    $order->set_status('paid');

    return true;

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
