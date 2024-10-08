<?php
class Elementor_s_checkouts extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 's-checkout_design';
    }

    public function get_title()
    {
        return esc_html__('S Checkout D', 's-checkout');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {
        function s_checkout_enqueue_dsfasdscripts()
        {
            //js
            wp_enqueue_script('jquery');
            wp_enqueue_script('s-checkosfgsdfgsdfgut-stripe-script', 'https://js.stripe.com/v3/', array(), null, true);

        }

        add_action('wp_enqueue_scripts', 's_checkout_enqueue_dsfasdscripts');


    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['post', 'slider'];
    }

    protected function render()
    {
        ?>
        <div class="pre-loader">
            <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="app" class="wrapper">

            <header class="header">
                <div class="container header__block row"> <img alt="" class="header__logo"
                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/Logo.png" width="160" />
                    <div class="header__info"> <span class="header__info-text">Only for <span class="geo-text">CA</span>
                            Residents</span> <img alt=""
                            src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/f2d4ccf7e4443494322bac8339f73b12.svg"
                            class="geo-flag" width="63" height="39" /> </div>
                </div>
            </header>
            <div class="order">
                <div class="container clearfix">
                    <div class="left-box">
                        <div class="heading">
                            <div class="steps">
                                <div class="step"><span>Qualify Order</span></div>
                                <div class="step active"><span>Finish Order</span></div>
                                <div class="step"><span>Summary</span></div>
                            </div>
                            <p style="margin-bottom:0">Special offer This Week Only</p>
                            <p> <img src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/890e691e2221ad00775d501341be47d4.png"
                                    alt="" class="emo" /> Sale Up To 45% OFF! <img
                                    src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/890e691e2221ad00775d501341be47d4.png"
                                    alt="" class="emo" /> </p>
                            <p class="current-text"> Current Availability: <span class="level row"> <span></span>
                                    <span></span> <span></span> <span></span> </span> LoW. &nbsp;Sell Out Risk: <b
                                    class="mark">High</b> </p>
                        </div>
                        <div class="content">
                            <div class="product product1 active" data-quantity="3">
                                <div class="row">
                                    <div class="left-s">
                                        <h3>BUY 3 GET 2 FREE!</h3>
                                    </div>
                                    <div class="right-s"> <span class="right-s__shipping"> Free Shipping</span> </div>
                                </div>
                                <div class="package-item">
                                    <div class="package-item__status"> <span></span> </div>
                                    <div class="package-images row">
                                        <div class="package-images__items"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/3bottol.png 2x"
                                                width="140" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items">
                                            <div class="package-small-block">
                                                <div class="free-green-ico"></div>
                                                <div class="row package-small-block__bottles"> <img
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png"
                                                        srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png 2x"
                                                        alt="" width="61" height="76" class="bottles-sm" /> <img
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png"
                                                        srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png 2x"
                                                        alt="" width="61" height="76" class="bottles-sm" /> </div> <span
                                                    class="value"><span class="save-price">$139.90</span> value</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose"> For Those Who Need <br /> to Lose 12+ Kilograms! </div> <span
                                            class="package-info__retail"> Retail: <span class="retail-price">$69.95</span>
                                        </span>
                                        <span class="package-info__price"> <i class="price"
                                                style="font-style:normal">$39.95</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span
                                                class="save-price-hard">$150</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product product2" data-quantity="2">
                                <div class="row">
                                    <div class="left-s">
                                        <h3>BUY 2 GET 1 FREE!</h3>
                                    </div>
                                    <div class="right-s"> <span class="right-s__shipping"> Free Shipping</span> </div>
                                </div>
                                <div class="package-item">
                                    <div class="package-item__status"> <span></span> </div>
                                    <div class="package-images row">
                                        <div class="package-images__items"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/double.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/double.png 2x"
                                                width="108" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items">
                                            <div class="package-small-block">
                                                <div class="free-green-ico"></div>
                                                <div class="row package-small-block__bottles"> <img
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png"
                                                        srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png 2x"
                                                        alt="" width="61" height="76" class="bottles-sm" /> </div> <span
                                                    class="value"><span class="save-price">$69.95</span> value</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose"> For Those Who Need <br /> to Lose 7+ Kilograms! </div> <span
                                            class="package-info__retail"> Retail: <span class="retail-price"></span> </span>
                                        <span class="package-info__price"> <i class="price"
                                                style="font-style:normal">$49.95</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span class="save-price-hard">$60</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product product3" data-quantity="1">
                                <div class="row">
                                    <div class="left-s">
                                        <h3>BUY 1 BOTTLE</h3>
                                    </div>
                                    <div class="right-s"> <span class="right-s__shipping"> Free Shipping</span> </div>
                                </div>
                                <div class="package-item">
                                    <div class="package-item__status"> <span></span> </div>
                                    <div class="package-images row">
                                        <div class="package-images__items"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png 2x"
                                                width="72" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items"></div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose">For Those Who Need <br />to Lose 3+ Kilograms!</div> <span
                                            class="package-info__retail"> Retail Price: </span> <span
                                            class="package-info__price"> <i class="price"
                                                style="font-style:normal">$69.95</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span class="save-price-hard">$0</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="guarantee">
                                <div class="guarantee-content"> <img
                                        src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/18a363937175b1dd64562fcfbdfa9b6d.svg"
                                        width="88" height="88" alt="" class="guarantee-icon" /> <span
                                        class="guarantee-text"><b>Money-Back Guarantee!</b> We're so confident that Active
                                        KETO Gummies will work for you that we are offering a 60-day Money-Back Guarantee!
                                        So, feel confident that you will get your result or your money back!</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="form-box" id="order-form"> <img
                                src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/f35e36b78623d2b0b16469f4a9332c31.svg"
                                alt="" class="arrow" />
                            <div class="form-header"> FINAL STEP <br /> PAYMENT INFORMATION </div>
                            <div class="form-in show-3ds-popup">
                                <form class="form-popup" id="checkout">
                                    <div class="delivery-type"> <span class="delivery-title">Choose shipping method:</span>
                                        <div class="delivery-row delivery-expedited"> <input checked="checked" type="radio"
                                                name="delivery" id="expedited-dna" /> <label for="expedited-dna"
                                                class="delivery-line"> <span class="radio-box"> <span class="radio-fake"></span>
                                                    Expedited </span> <span class="delivery-date" id="expedited-date"> VIP Rush
                                                    Delivery </span>
                                                <span class="delivery-price" id="expedited-price"></span> </label> </div>
                                        <div class="delivery-row delivery-standard"> <input type="radio" name="delivery"
                                                id="standard" /> <label for="standard" class="delivery-line"> <span
                                                    class="radio-box"> <span class="radio-fake"></span> Standard </span>
                                                <span class="delivery-date" id="standard-date"> Ships in 2-3 Days </span>
                                                <span class="delivery-price">$0.00</span> </label> </div>
                                    </div>
                                    <p> Your order will be processed <br /> on our secure servers </p> <label
                                        for="payment_as_shipping" class="payment_as_shipping_label"> <input type="checkbox"
                                            name="payment_as_shipping" class="payment_as_shipping" id="payment_as_shipping"
                                            checked="checked" /> <span>Billing same as Shipping</span> </label>
                                    <div class="billing-form"> <span class="billing-title">Billing Info</span>
                                        <div class="phone-12 columns"> <label>First Name: </label> </div>
                                        <div class="form-holder"> <input type="text" id="billingFirstName" name="firstName"
                                                placeholder="First Name" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Last Name: </label> </div>
                                        <div class="form-holder"> <input type="text" id="billingLastName" name="lastName"
                                                placeholder="Last Name" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Country:</label> </div>
                                        <div id="billingCountry" class="form-holder"> <select name="country"
                                                class="form-control" id="id_country"></select> </div>
                                        <div class="phone-12 columns"> <label>State/Province:</label> </div>
                                        <div id="billingState" class="form-holder"> <select name="state" class="form-control"
                                                id="id_state"></select> </div>
                                        <div class="phone-12 columns"> <label>Address:</label> </div>
                                        <div id="billingAddress" class="form-holder"> <input type="text" name="address"
                                                placeholder="Address" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>City:</label> </div>
                                        <div id="billingCity" class="form-holder"> <input type="text" name="city"
                                                placeholder="City" class="form-control" required /> </div>
                                        <div class="phone-12 columns"> <label>Zip/Postal Code:</label> </div>
                                        <div id="billingZipCode" class="form-holder"> <input type="text" name="zipCode"
                                                placeholder="Zip/Postal Code" class="form-control" required="" /> </div>
                                        <span class="billing-title payment-title">Payment Info</span>
                                    </div>
                                    <ul class="form-cards">
                                        <li class="first-text">Accepted Cards:</li>
                                    </ul>
                                    <div class="form-error-text" id="formError" style="display:none;margin-bottom:20px">
                                    </div>
                                    <div class="bg">
                                        <div class="form-holder card-container"> <label>Card Number:</label> <input
                                                class="form-control" id="cardnumber" maxlength="16" name="cardNumber"
                                                placeholder="•••• •••• •••• ••••" type="tel" /> </div>
                                        <div class="form-fields">
                                            <div class="form-block"> <label>Card Expiry Date:</label>
                                                <div class="form-holder"> <select class="form-control" id="cardExpMonth"
                                                        name="expMonth">
                                                        <option value="">Month</option>
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                        <option value="06">6</option>
                                                        <option value="07">7</option>
                                                        <option value="08">8</option>
                                                        <option value="09">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select> </div>
                                                <p class="sep">/</p>
                                                <div class="form-holder"> <select class="form-control right" id="cardExpYear"
                                                        name="expYear">
                                                        <option value="">Year</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                        <option value="2035">2035</option>
                                                        <option value="2036">2036</option>
                                                        <option value="2037">2037</option>
                                                        <option value="2038">2038</option>
                                                    </select> </div>
                                            </div>
                                            <div class="form-holder cvv-container"> <label>CVV:</label> <input
                                                    class="form-control" id="cardcode" name="cvv" placeholder="•••"
                                                    type="tel" /> </div>
                                        </div>
                                    </div>


                                    <div id="payment-message"></div>

                                    <button class="submit-btn"> <span>RUSH MY ORDER NOW</span>
                                        <span>60-Day Satisfaction Guarantee</span> </button>
                                </form>
                            </div>
                        </div>
                        <div class="slider-block"> <span class="slider-title">REVIEWS FROM PEOPLE LIKE YOU!</span>
                            <div class="slider reviwe-slide">
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/review.png" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">Excellent</span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name">Marianna Hafsah</span> <span class="verif">Verified
                                                Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> These gummies are super delicious and really help me lose
                                        weight! 5 stars from me! </div>
                                </div>
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/review.png" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">Very effective</span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name">Evie Ravenna</span> <span class="verif">Verified
                                                Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> I tried them in combination with other keto products and
                                        dropped 8 kilograms by now. My highest recommendations! </div>
                                </div>
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/review.png" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">So delicious!</span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li class="half"></li>
                                            </ul> <span class="user-name">Ayla Shaye</span> <span class="verif">Verified
                                                Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> Whenever I want anything sweet, I eat these gummies and feel no
                                        guilt. They help me keep my good mood while dieting. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Stripe Card Element Form -->
        <form id="payment-form">
            <div id="card-element">
                <!-- Stripe.js will inject the Card Element here -->
            </div>
            <button id="submit">Pay</button>
            <div id="card-errors" role="alert"></div>
        </form>


        <script>
            jQuery(document).ready(function ($) {
                // Initialize Stripe
                var stripe = Stripe('pk_test_51L4nmyDKqALanvEEtdk10F2Ck6f2dLIYrklHHUFMTOYEonoPhCexSpfiL1NF9pZvB3yZNNG3RVNBCvVHt2WckjYm0090Rxk9NN');
                var elements = stripe.elements();

                var style = {
                    base: {
                        color: "#ef5e36",
                        fontFamily: "Arial, sans-serif",
                        fontSmoothing: "antialiased",
                        fontSize: "16px",
                        border:"2px solid red",
                        "::placeholder": {
                            color: "#eda24",
                        },
                    },
                    invalid: {
                        color: "#fa755a",
                        iconColor: "#fa755a",
                    },
                };

                var card = elements.create("card", { style: style });
                card.mount("#card-element");

                // Handle real-time validation errors from the card Element
                card.on('change', function (event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });

                // Handle form submission
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    stripe.createToken(card).then(function (result) {
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


        <!-- #region -->
        <?php

    }
}