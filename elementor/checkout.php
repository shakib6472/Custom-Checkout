<?php
class Elementor_s_checkout extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 's-checkout';
    }

    public function get_title()
    {
        return esc_html__('S Checkout', 's-checkout');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }

    protected function _register_controls()
    {
        function s_checkout_enqueue_scrsipts()
        {
            // Load jQuery and Stripe.js
            wp_enqueue_script('jquery');
            wp_enqueue_script('stripsadfasde-js', 'https://js.stripe.com/v3/', array(), null, true);
        }

        add_action('wp_enqueue_scripts', 's_checkout_enqueue_scrsipts');
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['checkout', 'stripe', 'payment'];
    }

    protected function render()
    {
        ?>
        <!-- Stripe Card Element Form -->
        <form id="payment-form">
            <div id="card-element">
                <!-- Stripe.js will inject the Card Element here -->
            </div>
            <button id="submit">Pay</button>
            <div id="card-errors" role="alert"></div>
        </form>

        <script>
            jQuery(document).ready(function($) {
                // Initialize Stripe
                var stripe = Stripe('pk_test_51L4nmyDKqALanvEEtdk10F2Ck6f2dLIYrklHHUFMTOYEonoPhCexSpfiL1NF9pZvB3yZNNG3RVNBCvVHt2WckjYm0090Rxk9NN');
                var elements = stripe.elements();

                // Create an instance of the card Element
                var card = elements.create('card');

                // Add an instance of the card Element into the card-element div
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element
                card.on('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });

                // Handle form submission
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            // Inform the customer there was an error
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server
                            stripeTokenHandler(result.token);
                        }
                    });
                });

                // Submit the token to your server
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            });
        </script>
        <?php
    }
}