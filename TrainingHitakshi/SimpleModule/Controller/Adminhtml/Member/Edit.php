<?php

namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'TrainingHitakshi_SimpleModule::entity';

        /**
         * @var \Magento\Framework\Registry
         */
        private $coreRegistry;
    
        /**
         * @var \TrainingHitakshi\SimpleModule\Model\MemberFactory
         */
        private $memberFactory;
    
        /**
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\Registry $coreRegistry,
         * @param \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\Registry $coreRegistry,
            \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory
        ) {
            parent::__construct($context);
            $this->coreRegistry = $coreRegistry;
            $this->memberFactory = $memberFactory; 
        }
    
       
        public function execute()
        {
            $rowId = (int) $this->getRequest()->getParam('member_id');
            $rowData = $this->memberFactory->create();
            
            
            if ($rowId) {
                $rowData = $rowData->load($rowId);
               
                if (!$rowData->getEntityId()) {
                    $this->messageManager->addError(__('row data no longer exist.'));
                    $this->_redirect('*/*/index');
                    return;
                }
            }
            $this->coreRegistry->register('row_data', $rowData);
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            
            $title = "Member Information";
            $resultPage->getConfig()->getTitle()->prepend($title);
            return $resultPage;
        }
    
      
    }