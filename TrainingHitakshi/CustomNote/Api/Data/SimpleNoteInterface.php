<?php

namespace TrainingHitakshi\CustomNote\Api\Data;

/**
 * Interface SimpleNoteInterface
 */
interface SimpleNoteInterface
{
    /**
     * Get Simple Note
     *
     * @return string
     */
    public function getSimpleNote();

    /**
     * Set Simple Note
     *
     * @param string $simpleNote
     *
     * @return void
     */
    public function setSimpleNote($simpleNote);
}