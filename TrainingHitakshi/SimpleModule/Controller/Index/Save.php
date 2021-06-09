<?php
namespace TrainingHitakshi\SimpleModule\Controller\Index;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use TrainingHitakshi\SimpleModule\Model\MemberFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Serialize\SerializerInterface;

class Save extends Action
{

    protected $_memberFactory;
    protected $resultPageFactory;
    /**
     * @var SessionManagerInterface
    */
    protected $_sessionManager;
    /**
     * @var SerializerInterface
    */
    protected $_serializer;

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

    public function execute()
    {   
        $resultRedirect     = $this->resultRedirectFactory->create();
        $memberModel          = $this->_memberFactory->create();
        $data               = $this->getRequest()->getPost(); 
        
        if($data['status'] == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $serializeData = $this->_serializer->serialize($data['hobbies']);

        if($data['member_id']){
            $memberModel->load($data['member_id']);
            $memberModel->setId($data['member_id']);
        }
       
        $memberModel->setData('name', $data['name']);
        $memberModel->setData('status', $status);
        $memberModel->setData('type', $data['type']);
        
        $memberModel->setData('hobbies', $serializeData);
        $memberModel->setData('color_selection', $data['color_selection']);    
     
		if($memberModel->save()){
            $this->messageManager->addSuccessMessage(__('The data has been saved.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }

        $this->_redirect('simplemodule/index/index');
        
    }
}