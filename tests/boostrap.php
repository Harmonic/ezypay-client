<?php
namespace Ezypay;

use Ezypay\Validation\ValidationBase;

define('DIR_SYSTEM', '/var/www/html/mst/system/');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterface.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceCustomer.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceCreate.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceUpdate.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfacePlan.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfacePaymentMethods.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceSubscription.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceInvoice.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceInvoiceItem.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResourceInterfaceSettlement.php');

require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResultInterface.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResultInterfaceList.php');
require_once (DIR_SYSTEM . 'library/ezypay/src/interface/ResultInterfaceError.php');


require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Resurce.php');


require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Customer.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Customer.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Plan.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Plan.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/PaymentMethod.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/PaymentMethod.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Subscription.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Subscription.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/SubscriptionPreview.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Invoice.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Invoice.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/InvoiceItem.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/InvoiceItem.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Payment.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Payment.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/resource/Settlement.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/object/Settlement.php');



require_once(DIR_SYSTEM . 'library/ezypay/src/object/ObjectFactory.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/interface/DriverInterface.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/driver/Curl.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultAbstractFactory.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultProducer.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultFactory.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultList.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultSingle.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultError.php');

require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultFactoryJson.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/result/ResultJson.php');

// validation
require_once(DIR_SYSTEM . 'library/ezypay/src/validation/ValidationBase.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/interface/ValidatorInterface.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/validation/Validation.php');
require_once(DIR_SYSTEM . 'library/ezypay/src/validation/validator/NotEmptyString.php');


define('BASE_URL','https://demoapi.ezypay.com/api/v2/');
define('API_KEY','z4Mc2z0tYOFBUertWAZtDggEAJTKCq');
define('MERCHANT_ID','7b9baeac-ede4-4f5c-b4e3-52c51c2db08c');

class Ezypay
{
    /**
     * Resource
     *
     * Factory for resource
     *
     * @param $name string
     * @param $driver \driverInterface
     *
     * @return \resourceInterface
     */
    public static function resource($name, \driverInterface $driver, ValidationBase $validationBase)
    {
        if (class_exists('Ezypay\\Resource\\'.$name,false))
        {
            $class = 'Ezypay\\Resource\\'.$name;
            return new $class($driver,$validationBase);
        }
    }

    /**
     * Driver
     *
     * Factory for driver
     *
     * @param $name string
     * @param $data array settings
     * @return \driverInterface
     */
    public static function driver($name,array $data)
    {
        if (class_exists('Ezypay\\Driver\\'.$name,false))
        {
            $class = 'Ezypay\\Driver\\'.$name;
            return new $class($data);
        }
    }
}

?>