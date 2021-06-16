<?php

namespace TrainingHitakshi\CustomNote\Api;

/**
 * Interface for saving the checkout note to the quote for orders
 *
 * @api
 */
interface SimpleNoteManagementInterface
{
    /**
     * @param int $cartId
     * @param \TrainingHitakshi\CustomNote\Api\Data\SimpleNoteInterface $simpleNote
     *
     * @return string
     */
    public function saveSimpleNote(
        $cartId,
        \TrainingHitakshi\CustomNote\Api\Data\SimpleNoteInterface $simpleNote
    );
}