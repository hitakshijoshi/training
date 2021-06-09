<?php
namespace TrainingHitakshi\SimpleModule\Block;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Index extends \Magento\Framework\View\Element\Template
{
     protected $_memberFactory;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory
          )
     {
          parent::__construct($context);
          $this->_memberFactory = $memberFactory;
     }
 
     public function getResult()
     {
          $member = $this->_memberFactory->create();
          $collection = $member->getCollection();
          return $collection;
     }
}