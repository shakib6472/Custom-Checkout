<?php
class Elementor_s_popup extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 's-popup';
    }

    public function get_title()
    {
        return esc_html__('S Popup', 's-checkout');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {

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
        <div class="tost-container">
            <div class="main">
                <div class="left">
                    <img src="https://tryglponeactivate.com/wp-content/uploads/2024/09/single-bottole.png" alt="">
                </div>
                <div class="right">
                    <div class="topline name">Oliver I. - AB</div>
                    <div class="topline">Purchased <span class="item">3</span> Bottle(s) of Active</div>
                    <div class="topline">GLP-1ACTIV8</div>
                    <div class="times"><span class="munite">10</span> Minutes Ago</div>
                </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                function getRandomElement(arr) {
                    return arr[Math.floor(Math.random() * arr.length)];
                }

                var names = [
                    "Sophia M.",
                    "Daniel R.",
                    "Emily T.",
                    "Michael A.",
                    "Olivia K.",
                    "James P.",
                    "Ava L.",
                    "John C.",
                    "Mia F.",
                    "David B.",
                ];

                var items = [2, 3]; // Number of bottles purchased: either 2 or 3.
                var minutes = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11]; // Time in minutes since purchase.

                setInterval(function () {
                    // Update the name
                    $(".topline.name").text(getRandomElement(names));
                    // Update the number of bottles purchased
                    $(".topline .item").text(getRandomElement(items));
                    // Update the time since purchase
                    $(".times .munite").text(getRandomElement(minutes)); 
                    // Show the notification by changing its position to visible
                    $(".tost-container").css("bottom", "30px");
                    // After 5 seconds, hide the notification by setting its position out of view
                    setTimeout(function () {
                        $(".tost-container").css("bottom", "-100px");
                        console.log('show');
                    }, 5000); // 5000 milliseconds = 5 seconds
                }, 10000); // 10000 milliseconds = 10 seconds
            });
        </script>
        <!-- #region -->
        <?php

    }
}