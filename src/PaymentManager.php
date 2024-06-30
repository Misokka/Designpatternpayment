<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe PaymentManager
 * Gère les interfaces de paiement et permet leur utilisation unifiée.
 */
class PaymentManager {
    private $interfaces = [];

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
}
?>
