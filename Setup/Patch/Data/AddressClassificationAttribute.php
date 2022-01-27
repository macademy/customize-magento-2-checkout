<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Setup\Patch\Data;

use Macademy\CustomCheckout\Model\Config\Source\AddressClassification;
use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddressClassificationAttribute implements DataPatchInterface
{
    const ATTRIBUTE_CODE = 'address_classification';

    private Attribute $attribute;
    private Config $config;
    private EavSetupFactory $eavSetupFactory;
    private ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        Attribute $attribute,
        Config $config,
        EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->attribute = $attribute;
        $this->config = $config;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply(): self
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE,
            [
                'type' => 'int',
                'label' => 'Address Classification',
                'input' => 'select',
                'source' => AddressClassification::class,
                'required' => true,
                'default' => 0,
                'system' => false,
                'position' => 150,
                'sort_order' => 150,
            ]
        );
        $attribute = $this->config->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE
        );
        $attribute->setData('used_in_forms', [
            'adminhtml_customer_address',
            'customer_address_edit',
            'customer_register_address',
        ]);
        $this->attribute->save($attribute);

        return $this;
    }
}
