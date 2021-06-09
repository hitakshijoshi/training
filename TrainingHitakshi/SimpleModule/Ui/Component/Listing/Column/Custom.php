<?php

namespace TrainingHitakshi\SimpleModule\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Serialize\SerializerInterface;
/**
 * Class Custom.
 */
class Custom extends Column {

    /**
     * Escaper.
     *
     * @var \Magento\Framework\Escaper
     */
    protected $escaper;
    protected $helper;
    /**
     * @var SerializerInterface
    */
    protected $_serializer;

    /**
     * Constructor.
     *
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper            $escaper
     * @param array              $components
     * @param array              $data
     * @param SerializerInterface $serializer
     */
    public function __construct(
    ContextInterface $context, UiComponentFactory $uiComponentFactory, Escaper $escaper, array $components = [],  array $data = [],SerializerInterface $serializer
    ) {
        $this->escaper = $escaper;
        $this->_serializer = $serializer;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = $this->prepareItem($item);
            }

        }

        return $dataSource;
    }

    /**
     * Get data.
     *
     * @param array $item
     *
     * @return string
     */
    protected function prepareItem(array $item) {
        
        $data = $this->_serializer->unserialize($item['hobbies']);

        return $data;
    }

}