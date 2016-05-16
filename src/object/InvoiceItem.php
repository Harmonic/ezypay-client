<?php

namespace Ezypay\Object;

/**
 * Class InvoiceItem
 *
 * @package Ezypay\Object
 */
class InvoiceItem
{
    /**
     * @var $invoiceId string The ID of the invoice.
     */
    private $invoiceId;
    /**
     * @var $invoiceItemId string The ID of the invoice item.
     */
    private $invoiceItemId;
    /**
     * @var $amount number The invoice item amount
     */
    private $amount;
    /**
     * @var $description string The invoice item description
     */
    private $description;
    /**
     * @var $inclusiveTaxRate number Invoice tax rate
     */
    private $inclusiveTaxRate;
    /**
     * @var $taxCode string Invoice tax code
     */
    private $taxCode;
    /**
     * @var $type string The type of invoice item. Can be Payment or Fee
     */
    private $type;

    /**
     * InvoiceItem constructor.
     * 
     * @param $data array
     */
    public function __construct($data)
    {
        foreach ( $data as $key => $value ){
            $this->$key = $value;
        }
    }
}