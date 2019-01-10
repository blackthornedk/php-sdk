<?php

namespace OnPay\API\Transaction;

class DetailedTransaction extends SimpleTransaction {

    /**
     * @internal Shall not be used outside the library
     * DetailedTransaction constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->expiryYear = isset($data['expiry_year']) ? $data['expiry_year'] :  null;
        $this->expiryMonth = isset($data['expiry_month']) ? $data['expiry_month'] : null;
        $this->acquirer = isset($data['acquirer']) ? $data['acquirer'] :  null;
        $this->cardCountry = isset($data['card_country']) ? $data['card_country'] : null;
        $this->cardBin = isset($data['card_bin']) ? $data['card_bin'] : null;
        $this->ip = isset($data['ip']) ? $data['ip'] : null;
        $this->ipCountry = isset($data['ip_country']) ? $data['ip_country'] : null;

        foreach ($data['history'] as $history) {
            $historyItem = new TransactionHistory($history);
            $this->history[] = $historyItem;
        }

        $this->subscriptionNumber = isset($data['transaction_number']) ? $data['transaction_number'] :  null;
        $this->subscriptionUuid = isset($data['subscription_uuid']) ? $data['subscription_uuid'] : null;
    }

    /**
     * @var string
     */
    public $acquirer;

    /**
     * @var int
     */
    public $cardCountry;

    /**
     * @var string
     */
    public $cardBin;

    /**
     * @var int
     */
    public $expiryMonth;

    /**
     * @var int
     */
    public $expiryYear;

    /**
     * @var string
     */
    public $ip;

    /**
     * @var int
     */
    public $ipCountry;

    /**
     * @var TransactionHistory[]
     */
    public $history = [];

    /**
     * @var string
     */
    public $subscriptionNumber;
    
    /**
     * @var string
     */
    public $subscriptionUuid;

}
