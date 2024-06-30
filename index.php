<?php
require 'vendor/autoload.php';

use Jerem\Designpatternpayment\PaymentManager;
use Jerem\Designpatternpayment\PayPalPayment;
use Jerem\Designpatternpayment\StripePayment;
use Jerem\Designpatternpayment\Transaction;
use Jerem\Designpatternpayment\Notifier;

// Créer une instance de PaymentManager
$paymentManager = new PaymentManager();
$notifier = new Notifier();

// Ajouter l'interface PayPal
$paypal = new PayPalPayment();
$paymentManager->addInterface('paypal', $paypal);
$paymentManager->initializeInterface('paypal', ['clientId' => 'testClientId', 'clientSecret' => 'testSecret']);

// Ajouter l'interface Stripe
$stripe = new StripePayment();
$paymentManager->addInterface('stripe', $stripe);
$paymentManager->initializeInterface('stripe', ['apiKey' => 'testApiKey']);

// Sélectionner dynamiquement l'interface PayPal
$paymentManager->selectInterface('paypal');

// Créer une transaction de manière flexible
$transaction = $paymentManager->createTransaction(100, 'USD', 'Dynamic PayPal Transaction');

// Exécuter la transaction via l'interface sélectionnée
$paypalResult = $paymentManager->executeSelectedTransaction($transaction);
echo "PayPal Transaction Result: ";
print_r($paypalResult);

// Notifier des tiers de l'état de la transaction
$notifier->notify($paypalResult);

// Annuler la transaction via l'interface sélectionnée
$paypalCancelResult = $paymentManager->cancelSelectedTransaction($transaction);
echo "PayPal Cancel Transaction Result: ";
print_r($paypalCancelResult);

// Notifier des tiers de l'état de la transaction annulée
$notifier->notify($paypalCancelResult);

// Sélectionner dynamiquement l'interface Stripe
$paymentManager->selectInterface('stripe');

// Créer une transaction de manière flexible
$transaction = $paymentManager->createTransaction(200, 'USD', 'Dynamic Stripe Transaction');

// Exécuter la transaction via l'interface sélectionnée
$stripeResult = $paymentManager->executeSelectedTransaction($transaction);
echo "Stripe Transaction Result: ";
print_r($stripeResult);

// Notifier des tiers de l'état de la transaction
$notifier->notify($stripeResult);

// Annuler la transaction via l'interface sélectionnée
$stripeCancelResult = $paymentManager->cancelSelectedTransaction($transaction);
echo "Stripe Cancel Transaction Result: ";
print_r($stripeCancelResult);

// Notifier des tiers de l'état de la transaction annulée
$notifier->notify($stripeCancelResult);
?>
