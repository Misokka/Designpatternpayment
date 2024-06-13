<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe PayPalPayment
 * Implémente PaymentInterface pour les paiements PayPal.
 * Design Pattern utilisé : Implémentation d'Interface
 */
class PayPalPayment implements PaymentInterface {
    private $clientId;
    private $clientSecret;

    /**
     * Initialiser PayPal avec des identifiants de connexion.
     * @param array $credentials
     */
    public function initialize(array $credentials) {
        $this->clientId = $credentials['clientId'];
        $this->clientSecret = $credentials['clientSecret'];
    }

    /**
     * Exécuter une transaction de paiement PayPal.
     * @param float $amount
     * @param string $currency
     * @param string $description
     * @return array
     */
    public function executeTransaction($amount, $currency, $description) {
        // Simulation d'une transaction PayPal
        return ['status' => 'success', 'transactionId' => '12345'];
    }

    /**
     * Annuler une transaction de paiement PayPal.
     * @param string $transactionId
     * @return array
     */
    public function cancelTransaction($transactionId) {
        // Simulation de l'annulation d'une transaction PayPal
        return ['status' => 'cancelled', 'transactionId' => $transactionId];
    }
}
?>
