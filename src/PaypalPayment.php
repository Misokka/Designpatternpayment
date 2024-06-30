<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe PayPalPayment
 * Implémente PaymentInterface pour les paiements PayPal.
 */
class PaypalPayment implements PaymentInterface {
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
     * @param Transaction $transaction
     * @return Transaction
     */
    public function executeTransaction(Transaction $transaction) {
        // Simulation d'une transaction PayPal
        $transaction->setTransactionId('12345');
        $transaction->setStatus('success');
        return $transaction;
    }

    /**
     * Annuler une transaction de paiement PayPal.
     * @param Transaction $transaction
     * @return Transaction
     */
    public function cancelTransaction(Transaction $transaction) {
        // Simulation de l'annulation d'une transaction PayPal
        $transaction->setStatus('cancelled');
        return $transaction;
    }
}
?>
