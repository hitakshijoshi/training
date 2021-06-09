<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('TrainingHitakshi_SimpleModule::member');
        $resultPage->addBreadcrumb(__('Manage Members'), __('Manage Members'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Members'));

        $dataPersistor = $this->_objectManager->get('Magento\Framework\App\Request\DataPersistorInterface');
        $dataPersistor->clear('member');

        return $resultPage;
    }

    /**
     * check acl condition
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TrainingHitakshi_SimpleModule::member');
    }
}