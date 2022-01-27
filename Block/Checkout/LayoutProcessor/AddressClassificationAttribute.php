<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout\LayoutProcessor;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class AddressClassificationAttribute implements LayoutProcessorInterface
{
    public function process($jsLayout): array
    {
        $attributeCode = 'address_classification';
        $attributeData = &$jsLayout['components']['checkout']['children']
            ['steps']['children']
            ['shipping-step']['children']
            ['shippingAddress']['children']
            ['shipping-address-fieldset']['children']
            [$attributeCode];

        $attributeData['config']['customScope'] = 'shippingAddress.custom_attributes';
        $attributeData['dataScope'] = "shippingAddress.custom_attributes.$attributeCode";

        foreach ($jsLayout['components']['checkout']['children']
                 ['steps']['children']
                 ['billing-step']['children']
                 ['payment']['children']
                 ['payments-list']['children'] as &$paymentMethod) {
            $fields = &$paymentMethod['children']['form-fields']['children'];
            if (isset($fields[$attributeCode])) {
                unset($fields[$attributeCode]);
            }
        }

        return $jsLayout;
    }
}
