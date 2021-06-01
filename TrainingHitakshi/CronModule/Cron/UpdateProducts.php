<?php
namespace TrainingHitakshi\CronModule\Cron;

class UpdateProducts
{
	/** @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory */
	protected $_productCollectionFactory;

	/** @var \Magento\Framework\Stdlib\DateTime\DateTime */
	protected $_date;

	/** @var \Magento\Catalog\Api\CategoryLinkManagementInterface */
	protected $_categoryLinkManagement;

	public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory 
        $productCollectionFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Catalog\Api\CategoryLinkManagementInterface 
        $categoryLinkManagement
    	)
    {    
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_date = $date;
        $_categoryLinkManagement = $categoryLinkManagement;
    }

	public function execute()
	{
		$date = $this->_date->gmtDate();
		$startDate =  $this->_date->date('Y-m-d 0:0:0', strtotime($date." -3 days"));

		// Use factory to create a new product collection
		$productCollection = $this->_productCollectionFactory->create();
		/** Apply filters here */
		$productCollection->addFieldToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);

		$productCollection->addFieldToFilter('created_at', array('from' => $startDate, 'to' => $date));

		
		foreach ($productCollection as $product) {
	    $categories = $product->getCategoryIds();
			if(count($categories) == 0) {
				
				$newCategoryIds = array('3','6');
				$sku = $product->getSku();
				$this->_categoryLinkManagement->assignProductToCategories($sku, $newCategoryIds);
			}
		}
	}
}