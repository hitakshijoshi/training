<?php

namespace TrainingHitakshi\LoginRestriction\Model\Ip;

use TrainingHitakshi\LoginRestriction\Model\ResourceModel\Ip\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $entityCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $ipCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $ipCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }


        return $this->loadedData;

    }
}