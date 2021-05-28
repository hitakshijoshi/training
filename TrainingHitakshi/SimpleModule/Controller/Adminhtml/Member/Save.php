<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

use TrainingHitakshi\SimpleModule\Model\Member;
use Magento\Backend\Model\View\Result\RedirectFactory;

/**
 * 
 */
class Save extends Action
{
	protected $model;
	protected $redirectFactory;
	
	private $pageFactory;
	public function __construct(
		RedirectFactory $redirectFactory,
		Member $member,
		PageFactory $pageFactory,
		
		Action\Context $context)
	{
		$this->redirectFactory = $redirectFactory;
		$this->model = $member;
		
		$this->pageFactory = $pageFactory;
		parent::__construct($context);
	}

	protected function _isAllowed(){
		return $this->_authorization->isAllowed("TrainingHitakshi_SimpleModule::parent");
	}

	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
		

		/** @var Magento\Backend\Model\View\Result\Redirect $resultRedirect */
		$resultRedirect = $this->redirectFactory->create();

		if($data){
			$id = $this->getRequest()->getParam('id');
			
			if($id)
			{
				$this->model->load($id);

			}
			 $data = array_filter($data, function($value) { return $value !== ''; });
			 
            $model = $this->model->setData($data);

            }
			
			try{

			$model->save();

            $this->messageManager->addSuccess(__('Successfully saved the item.'));
            $this->_getSession()->setFormData(false);                
            return $resultRedirect->setPath('*/*/index');
		}
		catch(\Exception $e){
			$this->messageManager->addErrorMessage($e->getMessage());

		}
	

        return $resultRedirect->setPath('*/*/index');

	}

	
}