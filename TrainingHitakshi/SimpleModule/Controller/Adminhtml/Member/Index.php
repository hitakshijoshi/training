<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * 
 */
class Index extends Action
{
	private $pageFactory;
	public function __construct(
		PageFactory $pageFactory,
		Action\Context $context)
	{
		$this->pageFactory = $pageFactory;
		parent::__construct($context);
	}

	protected function _isAllowed(){
		return $this->_authorization->isAllowed("TrainingHitakshi_SimpleModule::parent");
	}

	public function execute()
	{
		
		$resultPage = $this->pageFactory->create();
        
        return $resultPage;

	}

	
}