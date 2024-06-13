<?php

require_once "../../vendor/autoload.php";
require_once "../modele/stripe_modele.php";

use Omnipay\Omnipay;

define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51PJyq1Gg5b2ougpzGN6fhm6ZPHILnAFBVpCHDmCymDdCbRaRQD8Mm7eRjzbZNZYEv0eCQPIJeftImDr7HxfQShYk00C47Bgvec');
define('STRIPE_SECRET_KEY', 'sk_test_51PJyq1Gg5b2ougpzHIO0hXXqDRXmTOgj12cTTOB4CqQP7rhEJjDkimjIt2pP3asLcx0PQu9PwPfr65fUOi2kscWo00SJPxBqGL');
define('RETURN_URL', 'DOMAIN_URL/confirm.php');
define('PAYMENT_CURRENCY', 'EURO');

$gateway = Omnipay::create('Stripe\PaymentIntents');
$gateway->setApiKey(STRIPE_SECRET_KEY);