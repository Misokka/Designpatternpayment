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

function executerEtNotifierTransaction($paymentManager, $notifier, $transaction, $type) {
    // Exécuter la transaction via l'interface sélectionnée
    $result = $paymentManager->executeSelectedTransaction($transaction);
    echo "{$type} Transaction Result:\n";
    echo '<br>';
    echo var_export($result, true) . "\n\n";

    // Notifier des tiers de l'état de la transaction
    $notifier->notify($result);

    return $result;
}

$paypalResult = executerEtNotifierTransaction($paymentManager, $notifier, $transaction, 'PayPal');

// Annuler la transaction PayPal via l'interface sélectionnée
$paypalCancelResult = $paymentManager->cancelSelectedTransaction($transaction);
echo "PayPal Cancel Transaction Result:\n";
echo var_export($paypalCancelResult, true) . "\n\n";

// Notifier des tiers de l'état de la transaction annulée
$notifier->notify($paypalCancelResult);

$paymentManager->selectInterface('stripe');
$stripeResult = executerEtNotifierTransaction($paymentManager, $notifier, $transaction, 'Stripe');
?>
