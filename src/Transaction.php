<?php
namespace Jerem\Designpatternpayment;

/**
 * Classe Transaction
 * Représente une transaction de paiement.
 */
class Transaction {
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCESS = 'success';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELLED = 'cancelled';

    private $amount;
    private $currency;
    private $description;
    private $status;
    private $transactionId;

    /**
     * Constructeur de la classe Transaction.
     * @param float $amount Montant de la transaction.
     * @param string $currency Devise de la transaction.
     * @param string $description Description de la transaction.
     */
    public function __construct($amount, $currency, $description) {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->description = $description;
        $this->status = self::STATUS_PENDING;
        $this->transactionId = null;
    }

    // Getters et setters pour chaque propriété.
    public function getAmount() {
        return $this->amount;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getTransactionId() {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }
}
?>
