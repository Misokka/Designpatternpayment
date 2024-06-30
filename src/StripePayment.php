<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe StripePayment
 * Implémente PaymentInterface pour les paiements Stripe.
 */
class StripePayment implements PaymentInterface {
    private $apiKey;

    /**
     * Initialiser Stripe avec une clé API.
     * @param array $credentials
     */
    public function initialize(array $credentials) {
        $this->apiKey = $credentials['apiKey'];
    }

    /**
     * Exécuter une transaction de paiement Stripe.
     * @param Transaction $transaction
     * @return Transaction
     */
    public function executeTransaction(Transaction $transaction) {
        // Simulation d'une transaction Stripe
        $transaction->setTransactionId('67890');
        $transaction->setStatus('success');
        return $transaction;
    }

    /**
     * Annuler une transaction de paiement Stripe.
     * @param Transaction $transaction
     * @return Transaction
     */
    public function cancelTransaction(Transaction $transaction) {
        // Simulation de l'annulation d'une transaction Stripe
        $transaction->setStatus('cancelled');
        return $transaction;
    }
}
?>
