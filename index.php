<?php
require 'vendor/autoload.php';

use Jerem\Designpatternpayment\PaymentManager;
use Jerem\Designpatternpayment\PayPalPayment;
use Jerem\Designpatternpayment\StripePayment;

/**
 * Fichier index.php
 * Utilisé pour tester les fonctionnalités implémentées et vérifier que les transactions de paiement fonctionnent correctement.
 */

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

// Exécuter une transaction PayPal
$paypalResult = $paymentManager->executeTransaction('paypal', 100, 'USD', 'Test PayPal Transaction');
echo "PayPal Transaction Result: ";
print_r($paypalResult);

// Exécuter une transaction Stripe
$stripeResult = $paymentManager->executeTransaction('stripe', 200, 'USD', 'Test Stripe Transaction');
echo "Stripe Transaction Result: ";
print_r($stripeResult);

// Annuler une transaction PayPal
$paypalCancelResult = $paymentManager->cancelTransaction('paypal', '12345');
echo "PayPal Cancel Transaction Result: ";
print_r($paypalCancelResult);

// Annuler une transaction Stripe
$stripeCancelResult = $paymentManager->cancelTransaction('stripe', '67890');
echo "Stripe Cancel Transaction Result: ";
print_r($stripeCancelResult);
?>
