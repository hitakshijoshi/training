<?php

namespace TrainingHitakshi\LoginRestriction\Ui\Component\Listing\Column;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Escaper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class PageActions
 */
class IpAction extends Column
{
    /** Url path */
    const URL_PATH_EDIT = "ipaddr/login/edit";
    const URL_PATH_DELETE = "ipaddr/login/delete";


    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlBuilder $actionUrlBuilder
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
       // echo "<pre>"; print_r($dataSource); die();
       
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as  &$item) {
                $name = $this->getData('name');
                if (isset($item['ip_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(self::URL_PATH_EDIT, ['ip_id' => $item['ip_id'],'_current' => true]),
                        'label' => __('Edit')
                    ];
                    
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::URL_PATH_DELETE, ['ip_id' => $item['ip_id'],'_current' => true]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete Entity'),
                            'message' => __('Are you sure you want to delete a Entity record?')
                        ]
                    ];
                }
                
            }
        }
        
        return $dataSource;
    }

    /**
     * Get instance of escaper
     * @return Escaper
     * @deprecated 101.0.7
     */
    private function getEscaper()
    {
        if (!$this->escaper) {
            $this->escaper = ObjectManager::getInstance()->get(Escaper::class);
        }
        return $this->escaper;
    }
}