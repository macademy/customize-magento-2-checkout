<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        return [
            'myKey' => 'myValue',
        ];
    }
}
