<?php

namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;

use Magento\Backend\App\Action\Context;
use TrainingHitakshi\SimpleModule\Model\MemberFactory;
use Magento\Framework\Controller\ResultFactory;
    
class Addnew extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'TrainingHitakshi_SimpleModule::entity';

    
    /**
     * @var \TrainingHitakshi\SimpleModule\Model\MemberFactory
     */
    private $memberFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory
     */
    public function __construct(
        Context $context,
        MemberFactory $memberFactory
    ) {
        parent::__construct($context);
        $this->memberFactory = $memberFactory;            
    }
    

    /**
     * Create new Member
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        
        $this->memberFactory->create();
        
        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('TrainingHitakshi_SimpleModule::member_menu');
        
        $title = "Member Information";
        
        $resultPage->getConfig()->getTitle()->prepend($title);
        
        return $resultPage;
    }
}  