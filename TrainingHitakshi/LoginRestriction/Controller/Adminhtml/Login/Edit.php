<?php

namespace TrainingHitakshi\LoginRestriction\Controller\Adminhtml\Login;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'TrainingHitakshi_LoginRestriction::entity';

        /**
         * @var \Magento\Framework\Registry
         */
        private $coreRegistry;
    
        /**
         * @var \TrainingHitakshi\LoginRestriction\Model\IpFactory
         */
        private $ipFactory;
    
        /**
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\Registry $coreRegistry,
         * @param \TrainingHitakshi\LoginRestriction\Model\IpFactory $ipFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\Registry $coreRegistry,
            \TrainingHitakshi\LoginRestriction\Model\IpFactory $ipFactory
        ) {
            parent::__construct($context);
            $this->coreRegistry = $coreRegistry;
            $this->ipFactory = $ipFactory; 
        }
    
       
        public function execute()
        {
            $rowId = (int) $this->getRequest()->getParam('ip_id');
            $rowData = $this->ipFactory->create();
            
            
            if ($rowId) {
                $rowData = $rowData->load($rowId);
               // echo "<pre>"; var_dump($rowData); die();
                if (!$rowData->getEntityId()) {
                    $this->messageManager->addError(__('row data no longer exist.'));
                    $this->_redirect('*/*/index');
                    return;
                }
            }
            $this->coreRegistry->register('row_data', $rowData);
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            //$resultPage->setActiveMenu('LoginRestriction_TaskModule::ip_menu');
            $title = "Ip Information";
            $resultPage->getConfig()->getTitle()->prepend($title);
            return $resultPage;
        }
    
      
    }