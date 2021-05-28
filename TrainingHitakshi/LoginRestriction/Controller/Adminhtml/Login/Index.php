<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\LoginRestriction\Controller\Adminhtml\Login;
class Index extends \Magento\Backend\App\Action
    {
        /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'TrainingHitakshi_LoginRestriction::ip';

        /**
        * @var \Magento\Framework\View\Result\PageFactory
        */
        protected $resultPageFactory;

        /**
         * Constructor
         *
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
        ) {
                parent::__construct($context);
                $this->resultPageFactory = $resultPageFactory;
        }

        /**
         * Load the page defined in view/adminhtml/layout/routeadminlabel_controllername_index.xml
         *
         * @return \Magento\Framework\View\Result\Page
         */
        public function execute()
        {

            $resultPage = $this->resultPageFactory->create();
            
            $resultPage->getConfig()->getTitle()->prepend((__('IP Address List')));

            return $resultPage;
        }
        
    }
?>
  