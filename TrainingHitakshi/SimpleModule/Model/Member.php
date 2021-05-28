<?php
namespace TrainingHitakshi\SimpleModule\Model;

class Member extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'member_data';

	protected $_cacheTag = 'member_data';

	protected $_eventPrefix = 'member_data';

	protected function _construct()
	{
		$this->_init('TrainingHitakshi\SimpleModule\Model\ResourceModel\Member');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}