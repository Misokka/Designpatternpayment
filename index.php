<?php
require 'vendor/autoload.php';

use Jerem\Designpatternpayment\PaymentManager;
use Jerem\Designpatternpayment\PayPalPayment;
use Jerem\Designpatternpayment\StripePayment;
use Jerem\Designpatternpayment\Transaction;

// Créer une instance de PaymentManager
$paymentManager = new PaymentManager();

// Ajouter l'interface PayPal
$paypal = new PayPalPayment();
$paymentManager->addInterface('paypal', $paypal);
$paymentManager->initializeInterface('paypal', ['clientId' => 'testClientId', 'clientSecret' => 'testSecret']);

// Ajouter l'interface Stripe
$stripe = new StripePayment();
$paymentManager->addInterface('stripe', $stripe);
$paymentManager->initializeInterface('stripe', ['apiKey' => 'testApiKey']);

// Créer une transaction PayPal
$paypalTransaction = new Transaction(100, 'USD', 'Test PayPal Transaction');
$paypalResult = $paymentManager->executeTransaction('paypal', $paypalTransaction);
echo "PayPal Transaction Result: ";
print_r($paypalResult);

// Créer une transaction Stripe
$stripeTransaction = new Transaction(200, 'USD', 'Test Stripe Transaction');
$stripeResult = $paymentManager->executeTransaction('stripe', $stripeTransaction);
echo "Stripe Transaction Result: ";
print_r($stripeResult);

// Annuler une transaction PayPal
$paypalCancelResult = $paymentManager->cancelTransaction('paypal', $paypalTransaction);
echo "PayPal Cancel Transaction Result: ";
print_r($paypalCancelResult);

// Annuler une transaction Stripe
$stripeCancelResult = $paymentManager->cancelTransaction('stripe', $stripeTransaction);
echo "Stripe Cancel Transaction Result: ";
print_r($stripeCancelResult);
?>
