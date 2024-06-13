<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe StripePayment
 * Implémente PaymentInterface pour les paiements Stripe.
 * Design Pattern utilisé : Implémentation d'Interface
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
     * @param float $amount
     * @param string $currency
     * @param string $description
     * @return array
     */
    public function executeTransaction($amount, $currency, $description) {
        // Simulation d'une transaction Stripe
        return ['status' => 'success', 'transactionId' => '67890'];
    }

    /**
     * Annuler une transaction de paiement Stripe.
     * @param string $transactionId
     * @return array
     */
    public function cancelTransaction($transactionId) {
        // Simulation de l'annulation d'une transaction Stripe
        return ['status' => 'cancelled', 'transactionId' => $transactionId];
    }
}
?>
