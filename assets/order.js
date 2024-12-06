jQuery(document).ready(function ($) {
  console.log("Order.js 2.4");

  var today = new Date();
  var options = { year: "numeric", month: "long", day: "numeric" };
  var formattedDate = today.toLocaleDateString("en-US", options);
  $(".today-time").text(formattedDate);

  // Initialize Stripe
  var stripe = Stripe(
    "pk_live_51PwRkVFxD7iHjsUzo1EW4RPzig76yP9EqETFgRECjgCrCZX0ynIkyPcxEGWfgXTsKNJW4Kl6dBKXSUx0tY2ajtkt001YBYLDd5"
  );

  var elements = stripe.elements();

  var style = {
    base: {
      color: "#000",
      fontFamily: "Arial, sans-serif",
      fontSmoothing: "antialiased",
      fontSize: "16px",
      lineHeight: "24px",
      "::placeholder": {
        color: "#eda24",
      },
    },
    invalid: {
      color: "#ff0000",
      iconColor: "#ff0000",
    },
  };
  // Create individual instances of the card elements
  var cardNumber = elements.create("cardNumber", { style: style });
  var cardExpiry = elements.create("cardExpiry", { style: style });
  var cardCvc = elements.create("cardCvc", { style: style });

  // Mount the card elements into the DOM
  cardNumber.mount("#card-element-number");
  cardExpiry.mount("#card-element-expiry");
  cardCvc.mount("#card-element-cvc");
  // card.mount("#card-element");
  var cardBrandIcons = {
    visa: "https://tryglponeactivate.com/wp-content/uploads/2024/09/visa-1.png",
    mastercard:
      "https://tryglponeactivate.com/wp-content/uploads/2024/09/mastercard.png",
    amex: "https://tryglponeactivate.com/wp-content/uploads/2024/09/amex.png",
    // Add more card types as needed
  };

  // Handle card brand detection
  cardNumber.on("change", function (event) {
    var cardIcon = document.getElementById("card-brand-icon");
    if (event.brand) {
      cardIcon.src =
        cardBrandIcons[event.brand] ||
        "https://tryglponeactivate.com/wp-content/uploads/2024/09/cardplaceholder.png"; // Adjust the URL to the location of your icons
      cardIcon.style.display = "block";
    } else {
      cardIcon.style.display = "none";
    }
  });
  // Submit the token to your server
  $(".submit-btn").click(function (e) {
    e.preventDefault();
    $(".pre-loader").css("display", "flex");
    var package = $(".product.active").data("quantity");
    var deliveryValue = $('input[name="delivery"]:checked').val();

    // Stripe Proccessing

    stripe.createToken(cardNumber).then(function (result) {
      if (result.error) {
        // Inform the customer there was an error
        var errorElement = document.getElementById("card-errors");
        errorElement.textContent = result.error.message;
        $(".pre-loader").css("display", "none");
      } else {
        // Send the token to your server
        $.ajax({
          type: "POST",
          url: ajax_object.ajax_url, // WordPress AJAX URL provided via wp_localize_script
          data: {
            action: "process_stripe_payment", // Action hook to handle the AJAX request in your functions.php
            token: result.token.id, // Pass form data to the backend
            package: package,
            deliveryValue: deliveryValue,
          },
          dataType: "json",
          success: function (response) {
            // Handle success response
            console.log(response);
            if (response.success) {
              window.location = ajax_object.thank_you;
            } else {
              alert('Payment Failed, Please try again');
            }
            // Reload the window
          },
          error: function (xhr, textStatus, errorThrown) {
            console.log(errorThrown);
            // Handle error
            console.error("Error:", errorThrown);
          },
        });
      }
    });
  });

  $(".product").click(function (e) {
    e.preventDefault();
    console.log($(this).hasClass("product2"));
    $(".product").removeClass("active");
    $(this).addClass("active");
   
    
  });

  $(".reviwe-slide").slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    dotsClass: "slick-dots",
    swipe: true,
  });


  // set hewight at inititate
  if ($('.wrapper.w-1').length) {
    // Get the total height of .wrapper.w-1 including padding and borders
    var wrapperHeight = $('.wrapper.w-1').outerHeight();
    // Set the height of .height_for_whole to the calculated height + 80px
    $('.height_for_whole').css('height', wrapperHeight + 10 + 'px');
  }


  $('.first_step').click(function (e) {
    e.preventDefault(); // Prevent default action
    // Get the total height of .wrapper.w-1 including padding and borders
    var wrapperHeight = $('.wrapper.w-2').outerHeight();
    // Set the height of .height_for_whole to the calculated height + 80px
    $('.height_for_whole').css('height', wrapperHeight + 10 + 'px');

    var isValid = true;
    // Iterate over each input field in #first_form
    $('#first_form input').each(function () {
      if ($.trim($(this).val()) === '') {
        isValid = false;  // If any field is empty, set isValid to false
        return false;  // Exit loop
      }
    });

    // If all fields are valid (not empty), proceed with the animation
    if (isValid) {
      console.log('All fields are filled');
      $('.wrapper.w-1').css('left', '-150%');
      $('.wrapper.w-2').css('left', '0%');
      $('.wrapper.w-3').css('left', '150%');
      $('.wrapper.w-4').css('left', '300%');
    } else {
      console.log('Some fields are empty');
      alert('Please fill all the fields.');
    }
  });


  $('.second_step').click(function (e) {
    e.preventDefault(); // Prevent default action if the button is inside a form or a link
    var wrapperHeight = $('.wrapper.w-3').outerHeight();
    // Set the height of .height_for_whole to the calculated height + 80px
    $('.height_for_whole').css('height', wrapperHeight + 10 + 'px');

    var quantity = $(this).data('quantity'); // Fetch data-quantity attribute
    console.log(quantity); // Log the quantity to the console

    // Proceed with the animation
    $('.wrapper.w-1').css('left', '-300%');
    $('.wrapper.w-2').css('left', '-150%');
    $('.wrapper.w-3').css('left', '0%');
    $('.wrapper.w-4').css('left', '150%');
  });

  $('.third_step').click(function (e) {
    //third_form

    e.preventDefault(); // Prevent default action
    var wrapperHeight = $('.wrapper.w-4').outerHeight();
    // Set the height of .height_for_whole to the calculated height + 80px
    $('.height_for_whole').css('height', wrapperHeight + 10 + 'px');

    var isValid = true;

    // Iterate over each input field in #first_form
    $('#third_form input').each(function () {
      if ($.trim($(this).val()) === '') {
        isValid = false;  // If any field is empty, set isValid to false
        return false;  // Exit loop
      }

    });

    // If all fields are valid (not empty), proceed with the animation
    if (isValid) {
      $('.wrapper.w-1').css('left', '-450%');
      $('.wrapper.w-2').css('left', '-300%');
      $('.wrapper.w-3').css('left', '-150%');
      $('.wrapper.w-4').css('left', '0%');
    } else {

      alert('Please fill all the fields.');
    }



  });

  // Set the initial time in seconds
  var totalSeconds = 9 * 60 + 35; // 9 minutes and 35 seconds

  // Function to update the timer
  function updateTimer() {
      // Calculate minutes and seconds
      var minutes = Math.floor(totalSeconds / 60);
      var seconds = totalSeconds % 60;

      // Format minutes and seconds to always show two digits
      var formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
      var formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

      // Update the timer display
      $('.counting-down-timer').text(formattedMinutes + ':' + formattedSeconds);

      // Decrease the total seconds
      if (totalSeconds > 0) {
          totalSeconds--;
      } else {
          clearInterval(timerInterval); // Stop the timer when it reaches zero
          $('.counting-down-timer').text('Time is up!'); // Message when time is up
      }
  }
  // Call updateTimer immediately to set the initial value
  updateTimer();
  // Update the timer every second
  var timerInterval = setInterval(updateTimer, 1000);

});

