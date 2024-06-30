<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe PaymentManager
 * Gère les interfaces de paiement et permet leur utilisation unifiée.
 */
class PaymentManager {
    private $interfaces = [];
    private $selectedInterface;

    /**
     * Ajouter une interface de paiement.
     * @param string $name
     * @param PaymentInterface $interface
     */
    public function addInterface($name, PaymentInterface $interface) {
        $this->interfaces[$name] = $interface;
    }

    /**
     * Supprimer une interface de paiement.
     * @param string $name
     */
    public function removeInterface($name) {
        unset($this->interfaces[$name]);
    }

    /**
     * Initialiser une interface de paiement avec des identifiants de connexion.
     * @param string $name
     * @param array $credentials
     */
    public function initializeInterface($name, array $credentials) {
        if (isset($this->interfaces[$name])) {
            $this->interfaces[$name]->initialize($credentials);
        }
    }

    /**
     * Sélectionner dynamiquement une interface de paiement.
     * @param string $name
     */
    public function selectInterface($name) {
        if (isset($this->interfaces[$name])) {
            $this->selectedInterface = $this->interfaces[$name];
        }
    }

    /**
     * Exécuter une transaction de paiement via l'interface sélectionnée.
     * @param Transaction $transaction
     * @return Transaction|null
     */
    public function executeSelectedTransaction(Transaction $transaction) {
        if ($this->selectedInterface) {
            return $this->selectedInterface->executeTransaction($transaction);
        }
        return null;
    }

    /**
     * Annuler une transaction de paiement via l'interface sélectionnée.
     * @param Transaction $transaction
     * @return Transaction|null
     */
    public function cancelSelectedTransaction(Transaction $transaction) {
        if ($this->selectedInterface) {
            return $this->selectedInterface->cancelTransaction($transaction);
        }
        return null;
    }

    /**
     * Exécuter une transaction de paiement via l'interface spécifiée.
     * @param string $name
     * @param Transaction $transaction
     * @return Transaction|null
     */
    public function executeTransaction($name, Transaction $transaction) {
        if (isset($this->interfaces[$name])) {
            return $this->interfaces[$name]->executeTransaction($transaction);
        }
        return null;
    }

    /**
     * Annuler une transaction de paiement via l'interface spécifiée.
     * @param string $name
     * @param Transaction $transaction
     * @return Transaction|null
     */
    public function cancelTransaction($name, Transaction $transaction) {
        if (isset($this->interfaces[$name])) {
            return $this->interfaces[$name]->cancelTransaction($transaction);
        }
        return null;
    }

    /**
     * Créer une transaction de manière flexible.
     * @param float $amount
     * @param string $currency
     * @param string $description
     * @return Transaction
     */
    public function createTransaction($amount, $currency, $description) {
        return new Transaction($amount, $currency, $description);
    }
}
?>
