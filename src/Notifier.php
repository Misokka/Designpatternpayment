<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe Notifier
 * Gère les notifications aux tiers.
 */
class Notifier {
    /**
     * Envoyer une notification de transaction.
     * @param Transaction $transaction
     */
    public function notify(Transaction $transaction) {
        // Simuler l'envoi d'une notification
        echo "Notification envoyée pour la transaction: " . $transaction->getTransactionId() . " avec le statut " . $transaction->getStatus() . "\n";
    }
}
?>
