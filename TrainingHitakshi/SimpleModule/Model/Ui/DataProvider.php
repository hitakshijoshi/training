<?php 
namespace TrainingHitakshi\SimpleModule\Model\Ui;

Use Magento\Ui\DataProvider\AbstractDataProvider;
use TrainingHitakshi\SimpleModule\Model\ResourceModel\Member\CollectionFactory;
 
class DataProvider extends AbstractDataProvider
{
    protected $loadedData;
    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    
    public function getData()
    {
       if(isset($this->loadedData)){
         return $this->loadedData;
       }
       $items = $this->collection->getItems();
       // print_r($items);
       // die();
       $this->loadedData = array();
       foreach ($items as $member) {
           $this->loadedData[$member->getId()]['member'] = $member->getData();
       }
       return $this->loadedData;
    }
}