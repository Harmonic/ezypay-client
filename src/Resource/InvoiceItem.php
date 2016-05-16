<?php


namespace Ezypay\Resource;

use Ezypay\Contract\IDriver;
use Ezypay\Contract\IResourceCreate;
use Ezypay\Contract\IResourceInvoiceItem;
use Ezypay\Contract\IResourceUpdate;
use Ezypay\Result\ResultProducer;
use Ezypay\Validation\ValidationBase;

/**
 * Class InvoiceItem
 *
 * @package Ezypay\Resource
 */
class InvoiceItem extends Resurce implements IResourceInvoiceItem, IResourceCreate, IResourceUpdate
{
    /**
     * @var string defautl object name
     */
    private $resourceType = 'InvoiceItem';


    /**
     * InvoiceItem constructor.
     * @param \DriverInterface $connector
     * @param $validation ValidationBase
     */
    public function __construct(IDriver $connector, ValidationBase $validation)
    {
        parent::__construct($connector, $validation, $this->resourceType);
    }

    /**
     * Creates an invoice item for an existing invoice
     *
     * @link https://demoapi.ezypay.com/help/docs#!/InvoiceItems/InvoiceItemsApi_CreateInvoiceItem
     * @param array $data The invoice item data. Refer to request body schema (see link)
     * @return ResultProducer
     */
    public function create(array $data)
    {
        $this->settings(array(
            'url' => 'invoiceitems',
            'method' => 'POST',
            'data' => $data
        ));

        return $this->result();

    }

    /**
     * Updates existing invoice Item
     *
     * @link https://demoapi.ezypay.com/help/docs#!/InvoiceItems/InvoiceItemsApi_UpdateInvoiceItem
     * @param $id string The ID of the invoice item.
     * @param array $data The invoice data to update.(see link)
     * @return ResultProducer
     */
    public function update($id, array $data)
    {
        $this->settings(array(
            'url' => 'invoiceitems/' . $id,
            'method' => 'PUT',
            'data' => $data
        ));

        return $this->result();
    }

    /**
     * Delete an existing invoice Item from an Invoice
     *
     * @link https://demoapi.ezypay.com/help/docs#!/InvoiceItems/InvoiceItemsApi_DeleteInvoiceItem
     * @param $id string The ID of the invoice item.
     * @return ResultProducer
     */
    public function delete($id)
    {
        $this->settings(array(
            'url' => 'invoiceitems/' . $id,
            'method' => 'DELETE'
        ));

        return $this->result();
    }

}