<?php
namespace TrainingHitakshi\ProductDailyDeal\Block;
class Display extends \Magento\Framework\View\Element\Template
{

	protected $_date;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Magento\Framework\Stdlib\DateTime\TimezoneInterface $date)
	{
		parent::__construct($context);
		$this->_date =  $date;
	}

}