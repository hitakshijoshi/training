<?php 
namespace TrainingHitakshi\SimpleModule\Block;
 
class Edit extends \Magento\Framework\View\Element\Template
{
     protected $_pageFactory;
     protected $_coreRegistry;
     protected $_memberLoader;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\Registry $coreRegistry,
          \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberLoader,
          array $data = []
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_coreRegistry = $coreRegistry;
          $this->_memberLoader = $memberLoader;
          return parent::__construct($context,$data);
     }
 
     public function execute()
     {
          return $this->_pageFactory->create();
     }
 
     public function getEditRecord()
     {
          $id = $this->_coreRegistry->registry('editRecordId');
               $post = $this->_memberLoader->create();
          $result = $post->load($id);
          $result = $result->getData();
          return $result;
     }
}