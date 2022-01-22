<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block\Checkout\LayoutProcessor;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class UpdateAddressSortOrder implements LayoutProcessorInterface
{
    public function process($jsLayout): array
    {
        foreach ($jsLayout['components']['checkout']['children']
            ['steps']['children']
            ['billing-step']['children']
            ['payment']['children']
            ['payments-list']['children'] as &$paymentMethod) {
            $fields = &$paymentMethod['children']['form-fields']['children'];
            if ($fields === null) {
                continue;
            }
            $fields['city']['sortOrder'] = '72';
            $fields['region_id']['sortOrder'] = '74';
            $fields['postcode']['sortOrder'] = '76';
        }

        return $jsLayout;
    }
}
