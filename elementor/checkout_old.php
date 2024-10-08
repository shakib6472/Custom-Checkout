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
                                        <h3>BUY 3 GET 3 FREE!</h3>
                                    </div>
                                    <div class="right-s"> <span class="right-s__shipping"> Free Shipping</span> </div>
                                </div>
                                <div class="package-item">
                                    <div class="package-item__status"> <span></span> </div>
                                    <div class="package-images row">
                                        <div class="package-images__items"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_02-1.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_02-1.png 2x"
                                                width="140" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items">
                                            <div class="package-small-block">
                                                <div class="free-green-ico"></div>
                                                <div class="row package-small-block__bottles"> <img
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_03.png"
                                                        srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_03.png 2x" alt="" width="120" height="80" class="bottles-sm" /> </div>
                                                <span class="value"><span class="save-price">$177.00</span> value</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose"> For Those Who Need <br /> to Lose 12+ Kilograms! </div> <span
                                            class="package-info__retail"> Retail: <span class="retail-price">$59</span>
                                        </span>
                                        <span class="package-info__price"> <i class="price"
                                                style="font-style:normal">$39.95</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span 
                                                class="save-price-hard">$177.00</span></span>
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
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_04.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_04.png 2x"
                                                width="108" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items">
                                            <div class="package-small-block">
                                                <div class="free-green-ico"></div>
                                                <div class="row package-small-block__bottles"> <img
                                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png"
                                                        srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png 2x"
                                                        alt="" width="61" height="76" class="bottles-sm" /> </div> <span
                                                    class="value"><span class="save-price">$59</span> value</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose"> For Those Who Need <br /> to Lose 7+ Kilograms! </div> <span
                                            class="package-info__retail"> Retail: <span class="retail-price">$59</span> </span>
                                        <span class="package-info__price"> <i class="price"
                                                style="font-style:normal">$49.95</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span class="save-price-hard">$59</span></span>
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
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png"
                                                srcset="https://tryglponeactivate.com/wp-content/uploads/2024/09/without-shadow_01.png 2x"
                                                width="72" height="130" alt="" class="bottles" /> </div>
                                        <div class="package-images__items"></div>
                                    </div>
                                    <div class="package-info">
                                        <div class="lose">For Those Who Need <br />to Lose 3+ Kilograms!</div> <span
                                            class="package-info__retail"> Retail Price: </span> <span
                                            class="package-info__price"> <i class="price"
                                                style="font-style:normal">$59</i><span>/per bottle*</span> </span> <span
                                            class="package-info__save">You Saved <span class="save-price-hard">$0</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="guarantee">
                                <div class="guarantee-content"> <img
                                        src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/18a363937175b1dd64562fcfbdfa9b6d.svg"
                                        width="88" height="88" alt="" class="guarantee-icon" /> <span
                                        class="guarantee-text"><b>Money-Back Guarantee!</b>We're so confident that GLP-1ACTIV8 Multi formula ingredients will work for you that we are offering a 60-day Money-Back Guarantee! So, feel confident that you will get your result or your money back!</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-box">
                        <div class="form-box" id="order-form"> <img
                                src="https://tryactiveketop.com/static/activeketo_gummies/ca-v1/desktop/images/f35e36b78623d2b0b16469f4a9332c31.svg"
                                alt="" class="arrow" />
                            <div class="form-header"> FINAL STEP <br /> PAYMENT INFORMATION </div>
                            <div class="form-in show-3ds-popup"> 
                                <div class="delivery-type"> <span class="delivery-title font-bold">Choose shipping method:</span>
                                    <div class="delivery-row delivery-expedited"> <input checked="checked" type="radio"
                                            name="delivery" id="expedited-dna" /> <label for="expedited-dna"
                                            class="delivery-line"> <span class="radio-box"> <span class="radio-fake"></span>
                                                Expedited </span> <span class="delivery-date" id="expedited-date">VIP Rush
                                                Delivery </span>
                                            <span class="delivery-price" id="expedited-price">$19.95</span> </label> </div>
                                    <div class="delivery-row delivery-standard"> <input type="radio" name="delivery"
                                            id="standard" /> <label for="standard" class="delivery-line"> <span
                                                class="radio-box"> <span class="radio-fake"></span> Standard </span>
                                            <span class="delivery-date" id="standard-date"> Ships in 2-3 Days </span>
                                            <span class="delivery-price">$00.00</span> </label> </div>
                                </div>
                                <p style="text-align:center;" class="font-bold"> Your order will be processed <br /> on our secure servers </p> 
                                <label
                                    for="payment_as_shipping" class="payment_as_shipping_label"> <input type="checkbox"
                                        name="payment_as_shipping" class="payment_as_shipping" id="payment_as_shipping"
                                        checked="checked" /> <span class="font-bold">Billing same as Shipping</span> </label>
                                <div class="billing-form"> <span class="billing-title font-bold">Billing Info</span>
                                    <div class="phone-12 columns"> <label>First Name: </label> </div>
                                    <div class="form-holder"> <input type="text" id="billingFirstName" name="firstName"
                                            placeholder="First Name" class="form-control" required /> </div>
                                    <div class="phone-12 columns"> <label>Last Name: </label> </div>
                                    <div class="form-holder"> <input type="text" id="billingLastName" name="lastName"
                                            placeholder="Last Name" class="form-control" required /> </div>
                                    <div class="phone-12 columns"> <label>Country:</label> </div>
                                    <div id="billingCountry" class="form-holder"> <select name="country" class="form-control"
                                            id="id_country"></select> </div>
                                    <div class="phone-12 columns"> <label>State/Province:</label> </div>
                                    <div id="billingState" class="form-holder"> <select name="state" class="form-control"
                                            id="id_state"></select> </div>
                                    <div class="phone-12 columns"> <label>Address:</label> </div>
                                    <div id="billingAddress" class="form-holder"> <input type="text" name="address"
                                            placeholder="Address" class="form-control" required /> </div>
                                    <div class="phone-12 columns"> <label>City:</label> </div>
                                    <div id="billingCity" class="form-holder"> <input type="text" name="city" placeholder="City"
                                            class="form-control" required /> </div>
                                    <div class="phone-12 columns"> <label>Zip/Postal Code:</label> </div>
                                    <div id="billingZipCode" class="form-holder"> <input type="text" name="zipCode"
                                            placeholder="Zip/Postal Code" class="form-control" required="" /> </div>
                                    <span class="billing-title payment-title">Payment Info</span>
                                </div>
                                <ul class="form-cards">
                                    <li class="first-text">Accepted Cards:</li>
                                    <li><img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/visa-1.png" alt=""></li>
                                    <li><img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/mastercard.png" alt=""></li>
                                </ul>
                                <div class="form-error-text" id="formError" style="display:none;margin-bottom:20px">
                                </div>


                                <div class="position-relative">
                                    <div id="card-element-number" class="custom-card-element"></div>
                                    <img id="card-brand-icon"
                                        src="https://tryglponeactivate.com/wp-content/uploads/2024/09/cardplaceholder.png"
                                        style="" alt="Card Brand"   />
                                </div>
                                <div class="d-flex">
                                    <div id="card-element-expiry" class="custom-card-element"></div>
                                    <div id="card-element-cvc" class="custom-card-element"></div>
                                </div>

                                <div id="card-errors" role="alert"></div>
                                <!-- <button type="submit">Submit Payment</button> -->

                                <div id="payment-message"></div>

                                <button class="submit-btn"> <span>RUSH MY ORDER NOW</span>
                                    <span>60-Day Satisfaction Guarantee</span> </button>

                            </div>
                        </div>
                        <div class="slider-block"> <span class="slider-title">REVIEWS FROM PEOPLE LIKE YOU!</span>
                            <div class="slider reviwe-slide">
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/1-scaled.jpg" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">A Natural Alternative to Ozempic!
                                        </span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name"> Sarah M.  </span>
<span class="verif">Verified Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> I was considering Ozempic but wanted a natural option. GLP1-ACTIV8 reduced my cravings and kept me full, just like Ozempic, but without the side effects. Love it!

</div>
                                </div>
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/3.jpg" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">Just as Good as Ozempic!
                                        </span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name">Michael D.
                                            </span>
                                            <span class="verif">Verified Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> GLP1-ACTIV8 has curbed my appetite and boosted my energy, just like Ozempic, but without needing a prescription. Super happy with the results!
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="slide-head clearfix"> <span class="slide-head__user"> <img
                                                src="https://tryglponeactivate.com/wp-content/uploads/2024/09/2-scaled.jpg" alt=""
                                                class="user-photo" width="54" height="52" /> </span>
                                        <div class="slide-head__content"> <span class="user-title">No More Ozempic for Me! </span>
                                            <ul class="stars">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul> <span class="user-name">Jessica L.
                                            </span>
                                            <span class="verif">Verified Customer</span>
                                        </div>
                                    </div>
                                    <div class="slide-text"> I wanted a natural way to boost GLP-1 without Ozempic. GLP1-ACTIV8 gives me the fullness and energy I need, minus the injections. It’s perfect! </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}