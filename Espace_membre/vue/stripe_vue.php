<?php
require_once '../autre/stripe_config.php';
if (isset ($_GET['prix'])) {
    $prix = $_GET['prix'];
  
}
?>
<head>

     <!-- CSS FILES -->                
     <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/tooplate-kool-form-pack.css" rel="stylesheet">

</head>
<link rel="stylesheet" href="style.css" />
<script src="https://js.stripe.com/v3/"></script>

<?php if ( isset($_SESSION['payment_id']) ) { ?>
    <div class="success">
        <strong><?php echo 'Payment is successful. Payment ID is :'. $_SESSION['payment_id']; ?></strong>
    </div>
    <?php unset($_SESSION['payment_id']); ?>
<?php } elseif ( isset($_SESSION['payment_error']) ) { ?>
    <div class="error">
        <strong><?php echo $_SESSION['payment_error']; ?></strong>
    </div>
    <?php unset($_SESSION['payment_error']); ?>
<?php } ?>

<form action="charge.php" method="post" id="payment-form">
    <div class="form-row p-3">
    <h3 type="text" name="amount" style="color:white; margin:20px;">vous devez payer  </h3>
        <h3 type="text" name="amount" style="color:green; margin:20px;"><?php echo $prix ?> euro</h3>
        <p><label for="card-element">Credit or debit card</label></p>
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
 
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert" style="color:red;"></div>
    </div>
    <p><button style="padding:10px; background-color:green;">Submit Payment</button></p>
</form>

<script>
var publishable_key = '<?php echo STRIPE_PUBLISHABLE_KEY; ?>';
</script>
<script >

// Create a Stripe client.
var stripe = Stripe(publishable_key);
 
// Create an instance of Elements.
var elements = stripe.elements();
 
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
 
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
 
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
 
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
 
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
 
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});
 
// Submit the form with the token ID.
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

</script>
<style>


.StripeElement {
    box-sizing: border-box;
    
    height: 40px;
    
    padding: 10px 12px;
    
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}
 
.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}
 
.StripeElement--invalid {
    border-color: #fa755a;
}
 
.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}

</style>