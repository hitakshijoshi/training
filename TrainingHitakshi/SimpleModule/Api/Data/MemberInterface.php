<?php

namespace TrainingHitakshi\SimpleModule\Api\Data;

/**
 * Entity interface.
 */

interface MemberInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'member_id';
    const NAME = 'name';
    const STATUS = 'status';
    const TYPE = 'type';
    const HOBBIES = 'hobbies';
    const COLOR = 'color_selection';
   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

   /**
    * Get Message.
    *
    * @return varchar
    */
    public function getName();

   /**
    * Set Message.
    */
    public function setName($name); 
    
    /**
    * Get Message.
    *
    * @return varchar
    */
    public function getStatus();

   /**
    * Set Message.
    */
    public function setStatus($member_status);  

    /**
    * Get Message.
    *
    * @return varchar
    */
    public function getType();

   /**
    * Set Message.
    */
    public function setType($member_type); 

    /**
    * Get Message.
    *
    * @return varchar
    */
    public function getHobbies();

   /**
    * Set Message.
    */
    public function setHobbies($member_hobbies); 
    /**
    * Get Message.
    *
    * @return varchar
    */
    public function getColor();

   /**
    * Set Message.
    */
    public function setColor($color); 
}