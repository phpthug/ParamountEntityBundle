<?php

namespace ParamountHOA\ParamountHoaEntityBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DocumentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DocumentRepository extends EntityRepository
{
    /**
     * Get a single document by ID
     *
     * @param $propertyId
     * @param $documentId
     *
     * @return mixed
     */
    public function getDocumentById($propertyId, $documentId) {
        return $this->getEntityManager()->createQuery(
            'SELECT a
            FROM ParamountHoaEntityBundle:Document a
            WHERE a.id = :documentId
            AND a.property = :property'
        )
            ->setParameter('documentId', $documentId)
            ->setParameter('property', $propertyId)
            ->getResult()[0];
    }

    /**
     * Get documents by type
     *
     * @param $propertyId
     * @param $documentType
     *
     * @return array
     */
    public function getDocumentsByType($propertyId, $documentType) {
        return $this->getEntityManager()->createQuery(
            'SELECT a
            FROM ParamountHoaEntityBundle:Document a
            WHERE a.type = :documentType
            AND a.property = :property'
        )
            ->setParameter('documentType', $documentType)
            ->setParameter('property', $propertyId)
            ->getResult();
    }

    /**
     * Retrieve all documents
     *
     * @param $propertyId
     *
     * @return array
     */
    public function getAllDocuments($propertyId) {
        return $this->getEntityManager()->createQuery(
            'SELECT a
            FROM ParamountHoaEntityBundle:Document a
            WHERE a.property = :property'
        )
            ->setParameter('property', $propertyId)
            ->getResult();
    }
}
