<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;

/**
 * 
 */
class NewAction extends Action
{
	protected $forwardFactory;
	private $pageFactory;
	public function __construct(
		ForwardFactory $forwardFactory,
		Action\Context $context)
	{
		$this->forwardFactory = $forwardFactory;
		parent::__construct($context);
	}

	protected function _isAllowed(){
		return $this->_authorization->isAllowed("TrainingHitakshi_SimpleModule::parent");
	}

	public function execute()
	{
		/** @var Magento\Backend\Model\View\Result\Forward $resultForward */
		$resultForward = $this->forwardFactory->create();
        
        return $resultForward->forward('edit');

	}

	
}