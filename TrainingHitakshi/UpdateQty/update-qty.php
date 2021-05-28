<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use Magento\Framework\App\Bootstrap;

require __DIR__ . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();  
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');


$products = array(1,2,3,4);

$collection = $objectManager->get('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory')->create()->addFieldToFilter('entity_id', array('in' => $products));

foreach ($collection as $productId) {

$productFactory = $objectManager->create('\Magento\Catalog\Api\Data\ProductInterfaceFactory');

$productRepository = $objectManager->create('Magento\Catalog\Api\ProductRepositoryInterface');

$StockState = $objectManager->get('\Magento\CatalogInventory\Api\StockStateInterface');

$product = $productFactory->create();
$product->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE)
    ->setId($productId->getEntityId())
    ->setSku($productId['sku'])
    ->setStockData(
        [
            'qty' => 170,
            'is_in_stock' => 1,
            
        ]
    );
$productRepository->save($product);


// $stockData = [
       
//         'is_in_stock' => 1, // Stock Availability of product
//         'qty' => 220 // qty of product
//         ];
// $product->setStockData($stockData);
// $product->setQuantityAndStockStatus($stockData);
// $productRepository->save($product);

}