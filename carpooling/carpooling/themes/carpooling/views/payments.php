<?php include('header.php');
include('title.php'); 
//var_dump($_POST);
//var_dump($profile);
//require_once('Stripe/init.php');
/*
if (isset($_POST['stripeToken']) && isset($_POST['pamount'])) {
    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey("sk_test_IKCe2LywUQRnG3KEZmP7wpYM");

    // Token is created using Checkout or Elements!
    // Get the payment token ID submitted by the form:
    $token = $_POST['stripeToken'];

    $oldcount = $usermoney[0]['money_count'];
    $fullname = $profile->user_first_name.' '.$profile->user_last_name;

    $pamountfinal = $_POST['pamount']*100;

    // Charge the user's card:
    $charge = \Stripe\Charge::create(array(
      "amount" => $pamountfinal,
      "currency" => "gbp",
      "description" => "Charge on SparrowwApp",
      "source" => $token,
      
      "metadata" => array("user_id" => $profile->user_id),
    ));
    if ($charge['paid']) {
        $this->Money_model->save_payments($charge['id'],$profile->user_id,($charge['amount']/100));
        //redirect('payments');
    }
  
    //var_dump($charge);
} else if (isset($success)) {

    echo theme_js('notification/goNotification.js', true) ?>
    <link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
        <script type="text/javascript">
                $.goNotification('Your Payment was successful', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
        </script>
    <?php
}
*/  



$charge_payments = $this->session->userdata('charge_payments');
if ($charge_payments=='success') {
    echo theme_js('notification/goNotification.js', true) ?>
    <link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
        <script type="text/javascript">
                $.goNotification('Your Payment was successful', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
        </script>
    <?php
    $this->session->unset_userdata('charge_payments');
}

?>



<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row center">

<style type="text/css">
    
#payment-form {
    max-width: 440px;
    margin: 20px auto;
    padding: 0 5px;
}

.StripeElement, #pamount {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid, #pamount.inputerror {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>



<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('pk_test_5vLV82apCg3oQRifptuGrLjx');
    var elements = stripe.elements();
</script>



<form action="<?= base_url("payments") ?>" method="post" id="payment-form">
    <input type="hidden" name="oldcount" value="<?php echo $usermoney[0]['money_count']; ?>">
    <input type="hidden" name="fullname" value="<?php echo $profile->user_first_name.' '.$profile->user_last_name; ?>">
    <input type="hidden" name="puserid" value="<?php echo $profile->user_id; ?>">

    <h3 class="margintop20 marginbot20">Amount</h3>
    <input id="pamount" name="pamount" class="width100 center">
    <div id="amount-errors" role="alert" class="spnerror margin5"></div>
    <div class="form-row">
        <label for="card-element" class="hidden">
        Credit or debit card
        </label>
        <h3 class="margintop40 marginbot20">Credit or debit card</h3>
        <div id="card-element">
        <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors -->
        <div id="card-errors" role="alert" class="spnerror margin5"></div>
    </div>

    <button class="margintop40" id="pbtn">Submit Payment</button>

    <div class="margin" style="color: #999">Use <span style="background: #fff">4242424242424242</span> for test</div>
</form>



<script type="text/javascript">
    // Custom styling can be passed to options when creating an Element.
    var style = {
      base: {
        // Add your base input styles here. For example:
        fontSize: '16px',
        color: "#32325d",
      }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style, hidePostalCode: true});

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');





    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });





    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the customer that there was an error
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
            if (validate_input()) {
                $('#pbtn').addClass('adisabled').addClass('noborder');
            // Send the token to your server
                stripeTokenHandler(result.token);
            }
        }
      });
    });




    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
        
      // Submit the form
      form.submit();

    }



    function validate_input() {
        var alert_pamount = $('#pamount').val();
        alert_pamount = alert_pamount+0; 
        if (alert_pamount<=0 || alert_pamount=='' || isNaN(parseFloat(alert_pamount))) {
            return false;
        } else {
            return true;
        }
    }


    $('#pbtn').click(function(){

       if(!validate_input()) {
            $('#amount-errors').text('Please enter your amount');
            $('#pamount').addClass('inputerror');
            //$('#pamount').val("");
        }
        else {
            $('#amount-errors').text('');
            $('#pamount').removeClass('inputerror');
        }
     
    });

</script>







        </div>
    </div>
</div>


<?php include('footer.php'); ?>
