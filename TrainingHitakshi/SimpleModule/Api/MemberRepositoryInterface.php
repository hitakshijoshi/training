<?php

namespace TrainingHitakshi\SimpleModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use TrainingHitakshi\SimpleModule\Api\Data\MemberInterface;
use TrainingHitakshi\SimpleModules\Api\Data\MemberSearchResultsInterface;

interface MemberRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ReviewSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param IpInterface $book
     * @return IpInterface
     * @throws LocalizedException
     */
    public function save(MemberInterface $member);

    /**
     * @param int $id
     * @return IpInterface
     * @throws LocalizedException
     */
    public function getById($id);

    /**
     * @param IpInterface $book
     * @return bool
     * @throws LocalizedException
     */
    public function delete(MemberInterface $member);

    /**
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($id);



}