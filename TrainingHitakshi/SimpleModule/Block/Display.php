<?php
namespace TrainingHitakshi\SimpleModule\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    protected $_memberFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \TrainingHitakshi\SimpleModule\Model\MemberFactory $memberFactory
    )
    {
        $this->_memberFactory = $memberFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getMemberCollection(){
        $member = $this->_memberFactory->create();
        return $member->getCollection();
    }
}
