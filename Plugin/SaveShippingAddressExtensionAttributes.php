<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Plugin;

use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Checkout\Api\ShippingInformationManagementInterface;

class SaveShippingAddressExtensionAttributes
{
    public function beforeSaveAddressInformation(
        ShippingInformationManagementInterface $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        $shippingAddress = $addressInformation->getShippingAddress();

        if ($extensionAttributes = $shippingAddress->getExtensionAttributes()) {
            $shippingAddress->setData('address_classification', $extensionAttributes->getAddressClassification());
        }
    }
}
