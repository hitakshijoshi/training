<?php

namespace TrainingHitakshi\SimpleModule\Model;

use TrainingHitakshi\SimpleModule\Api\Data\MemberInterface;

class Member extends \Magento\Framework\Model\AbstractModel implements MemberInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'member_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'member_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'member_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('TrainingHitakshi\SimpleModule\Model\ResourceModel\Member');
    }
    /**
     * Get IpId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set IpId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Message.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Message.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
     /**
     * Get Message.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Message.
     */
    public function setStatus($member_status)
    {
        return $this->setData(self::STATUS, $member_status);
    }

    /**
     * Get Message.
     *
     * @return varchar
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set Message.
     */
    public function setType($member_type)
    {
        return $this->setData(self::TYPE, $member_type);
    }

    /**
     * Get Message.
     *
     * @return varchar
     */
    public function getHobbies()
    {
        return $this->getData(self::HOBBIES);
    }

    /**
     * Set Message.
     */
    public function setHobbies($member_hobbies)
    {
        return $this->setData(self::HOBBIES, $member_hobbies);
    }
    /**
     * Get Message.
     *
     * @return varchar
     */
    public function getColor()
    {
        return $this->getData(self::COLOR);
    }

    /**
     * Set Message.
     */
    public function setColor($color)
    {
        return $this->setData(self::COLOR, $color);
    }
}