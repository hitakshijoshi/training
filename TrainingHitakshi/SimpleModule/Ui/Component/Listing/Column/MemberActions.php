<?php
namespace TrainingHitakshi\SimpleModule\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class MemberActions extends Column {
    
    protected $url;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, 
        array $components = [],
        UrlInterface $url,
        array $data = []) {

        $this->url = $url;
        
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]["edit"] = ['href'=>
                $this->url->getUrl('simplemodule/member/edit',['id'=>$item['member_id']]),
                'label'=>__('Edit'),
                'hidden'=>false
                ];

                $item[$this->getData('name')]["delete"] = ['href'=>
                $this->url->getUrl('simplemodule/member/delete',['id'=>$item['member_id']]),
                'label'=>__('Delete'),
                'hidden'=>false
                ];
                
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}