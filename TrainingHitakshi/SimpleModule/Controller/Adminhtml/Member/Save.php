<?php

namespace TrainingHitakshi\SimpleModule\Controller\Adminhtml\Member;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use TrainingHitakshi\SimpleModule\Model\MemberFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Serialize\SerializerInterface;

class Save extends Action
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'TrainingHitakshi_SimpleModule::member';

    /**
     * @var MemberFactory
    */
    protected $_memberFactory;
    
    /**
     * @var PageFactory
    */
    protected $resultPageFactory;

    /**
     * @var SessionManagerInterface
    */
    protected $_sessionManager;

    /**
     * @var SerializerInterface
    */
    protected $_serializer;



    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory,
     * @param \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory,
     * @param \Magento\Framework\Session\SessionManagerInterface $sessionManager,
     * @param \Magento\Framework\Serialize\SerializerInterface
     $serializer
     */
    public function __construct(
        Context $context,
        MemberFactory $memberFactory,
        PageFactory  $resultPageFactory,
        SessionManagerInterface $sessionManager,
        SerializerInterface $serializer
    )
    {
        parent::__construct($context);
        $this->_memberFactory = $memberFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
        $this->_serializer = $serializer;
        
    }
    
    /**
     * Save action
    */
    public function execute()
    {   
        $resultRedirect     = $this->resultRedirectFactory->create();
        $memberModel        = $this->_memberFactory->create();
        $data               = $this->getRequest()->getPost(); 
        
        try{
            if (!empty($data['member_id'])) {
                $memberModel->setMemberId($data['member_id']);
            }
            $memberModel->setData('name', $data['name']);
            $memberModel->setData('status', $data['status']);
            $memberModel->setData('type', $data['type']);
            $serializeData = $this->_serializer->serialize($data['hobbies']);
            $memberModel->setData('hobbies', $serializeData);
            $memberModel->setData('color_selection', $data['color_selection']);
            $memberModel->save();
            //check for `back` parameter
            if ($this->getRequest()->getParam('back')) { 
                return $resultRedirect->setPath('*/*/edit', ['member_id' => $memberModel->getId(), '_current' => true, '_use_rewrite' => true]);
            }

            $this->_redirect('*/*');
            $this->messageManager->addSuccess(__('The Member has been saved.'));

        }catch(\Exception $e){
            $this->messageManager->addError(__($e->getMessage()));
        }        
        
    }
}