<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use TrainingHitakshi\SimpleModule\Model\Member;

/**
 * 
 */
class Edit extends Action
{
	protected $pageFactory;
	protected $member;
	protected $registry;
	public function __construct(
		Member $member,
		PageFactory $pageFactory,
		Registry $registry,
		Action\Context $context)
	{
		$this->member = $member;
		$this->pageFactory = $pageFactory;
		$this->registry = $registry;
		parent::__construct($context);
	}

	protected function _isAllowed(){
		return $this->_authorization->isAllowed("TrainingHitakshi_SimpleModule::parent");
	}

	public function execute()
	{
		$id = $this->getRequest()->getparam('id');

		$model = $this->member;

		if($id){
			$model->load($id);
			if(!$model->getId()){
				$this->messageManager->addErrorMessage(__('This member does not exist'));
				
				$result = $this->resultRedirectFactory->create();
				return $result->setPath('simplemodule/member/index');
			}
		}
		$data = $this->_getSession()->getFormData(true);
		
		if(!empty($data)){
			$model->setData($data);
		}
		$this->registry->register("member",$model);
		/** @var \Magento\Framework\View\Result\Page $resultPage */
		$resultPage  = $this->pageFactory->create();
		
		
		if($id){
			$resultPage->getConfig()->getTitle()->prepend("Edit");
		}
		else{
			$resultPage->getConfig()->getTitle()->prepend("Add");
		}
		return $resultPage;
	}
}