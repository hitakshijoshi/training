<?php

namespace TrainingHitakshi\CustomNote\Model\Data;

use TrainingHitakshi\CustomNote\Api\Data\SimpleNoteInterface;
use TrainingHitakshi\CustomNote\Setup\SchemaInformation;
use Magento\Framework\Api\AbstractSimpleObject;

/**
 * Class SimpleNote
 */
class SimpleNote extends AbstractSimpleObject implements SimpleNoteInterface
{
    /**
     * @inheritdoc
     */
    public function getSimpleNote()
    {
        return $this->_get(SchemaInformation::ATTRIBUTE_SIMPLE_NOTE);
    }

    /**
     * @inheritdoc
     */
    public function setSimpleNote($simpleNote)
    {
        return $this->setData(SchemaInformation::ATTRIBUTE_SIMPLE_NOTE, $simpleNote);
    }
}