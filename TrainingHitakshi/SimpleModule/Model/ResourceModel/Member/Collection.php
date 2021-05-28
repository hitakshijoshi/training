<?php
namespace TrainingHitakshi\SimpleModule\Model\ResourceModel\Member;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'member_id';
	protected $_eventPrefix = 'member_data_collection';
	protected $_eventObject = 'member_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('TrainingHitakshi\SimpleModule\Model\Member', 'TrainingHitakshi\SimpleModule\Model\ResourceModel\Member');
	}

}