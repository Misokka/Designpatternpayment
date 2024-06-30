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
     * @param Transaction $transaction
     * @return Transaction
     */
    public function executeTransaction(Transaction $transaction);

    /**
     * Annuler une transaction de paiement.
     * @param Transaction $transaction
     * @return Transaction
     */
    public function cancelTransaction(Transaction $transaction);
}
?>
