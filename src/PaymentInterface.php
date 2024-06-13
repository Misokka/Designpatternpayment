<?php
namespace Jerem\Designpatternpayment;

/**
 * Interface PaymentInterface
 * Définie les méthodes communes pour toutes les classes de paiement.
 * Design Pattern utilisé : Interface
 */
interface PaymentInterface {
    /**
     * Initialiser l'interface de paiement avec des identifiants de connexion.
     * @param array $credentials
     */
    public function initialize(array $credentials);

    /**
     * Exécuter une transaction de paiement.
     * @param float $amount
     * @param string $currency
     * @param string $description
     * @return array
     */
    public function executeTransaction($amount, $currency, $description);

    /**
     * Annuler une transaction de paiement.
     * @param string $transactionId
     * @return array
     */
    public function cancelTransaction($transactionId);
}
?>
