<?php

namespace TrainingHitakshi\ProductDailyDeal\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->eavConfig       = $eavConfig;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();

		$eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,'deal_status',
			[
				'group'=>'Dailydeal',
				'type'=>'int',
				'backend' => '',
                'frontend' => '',
                'label' => 'Deal status',
                'input' => 'boolean',
                'class' => '',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '1',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
			]

		);
		

		
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,'deal_date',
			[
		'type' => 'datetime',
                'group' => 'Dailydeal',
                'backend' => '',
                'frontend' => 'Magento\Eav\Model\Entity\Attribute\Frontend\Datetime',
                'label' => 'Deal Date',
                'input' => 'date',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'sort_order' => 9,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
			]

		);
		$setup->endSetup();

	}
}