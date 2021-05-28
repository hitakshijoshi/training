<?php

namespace TrainingHitakshi\LoginRestriction\Controller\Adminhtml\Login;

use Magento\Backend\App\Action\Context;
use TrainingHitakshi\LoginRestriction\Model\IpFactory;
use Magento\Framework\Controller\ResultFactory;
    
class Addnew extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'TrainingHitakshi_LoginRestriction::entity';

    
    /**
     * @var \TrainingHitakshi\LoginRestriction\Model\IpFactory
     */
    private $ipFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \TrainingHitakshi\LoginRestriction\Model\IpFactory $ipFactory
     */
    public function __construct(
        Context $context,
        IpFactory $ipFactory
    ) {
        parent::__construct($context);
        $this->ipFactory = $ipFactory;            
    }
    

    /**
     * Create new Ip
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        
        $this->ipFactory->create();
        
        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('TrainingHitakshi_LoginRestriction::ip_menu');
        
        $title = "Ip Information";
        
        $resultPage->getConfig()->getTitle()->prepend($title);
        
        return $resultPage;
    }
}  