<?php

namespace App\Repository;

use App\Entity\Rentals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\AbstractQuery;

/**
 * @method Rentals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rentals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rentals[]    findAll()
 * @method Rentals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rentals::class);
    }

    public function getAllCampervans(
        $offset,
        $limit,
        $priceMin,
        $priceMax
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->andWhere('r.pricePerDay >= :min')
                ->andWhere('r.pricePerDay <= :max')
                ->setParameter('min', $priceMin)
                ->setParameter('max', $priceMax)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function listAllCampervansSorted(
        $offset,
        $limit,
        $priceMin,
        $priceMax,
        $sortOption
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->andWhere('r.pricePerDay >= :min')
                ->andWhere('r.pricePerDay <= :max')
                ->setParameter('min', $priceMin)
                ->setParameter('max', $priceMax)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->orderBy('r.' . $sortOption, 'ASC')
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getCampervansByMinMaxPrice(
        $min,
        $max
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->andWhere('r.pricePerDay >= :min')
                ->andWhere('r.pricePerDay <= :max')
                ->setParameter('min', $min)
                ->setParameter('max', $max)
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getCampervansByPageLimit(
        $limit,
        $offset
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getAllCamperVansNearLocation(
        $offset,
        $limit,
        $priceMin,
        $priceMax,
        $searchLat,
        $searchLng
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->select('r,(6371 * acos(cos(radians(:search_lat)) * cos(radians(r.lat) ) *   
             cos(radians(r.lng) - radians(:search_lng)) + sin(radians(:search_lat)) * sin(radians(r.lat)))  
             ) AS distance')
                ->andWhere('r.pricePerDay >= :min')
                ->andWhere('r.pricePerDay <= :max')
                ->setParameter('min', $priceMin)
                ->setParameter('max', $priceMax)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->setParameter('search_lat', $searchLat)
                ->setParameter('search_lng', $searchLng)
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getAllCamperVansNearLocationSorted(
        $offset,
        $limit,
        $priceMin,
        $priceMax,
        $searchLat,
        $searchLng,
        $sortOption
    ) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->select('r,(6371 * acos(cos(radians(:search_lat)) * cos(radians(r.lat) ) *   
             cos(radians(r.lng) - radians(:search_lng)) + sin(radians(:search_lat)) * sin(radians(r.lat)))  
             ) AS distance')
                ->andWhere('r.pricePerDay >= :min')
                ->andWhere('r.pricePerDay <= :max')
                ->setParameter('min', $priceMin)
                ->setParameter('max', $priceMax)
                ->setFirstResult($offset)
                ->setMaxResults($limit)
                ->setParameter('search_lat', $searchLat)
                ->setParameter('search_lng', $searchLng)
                ->orderBy('r.' . $sortOption, 'ASC')
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getAllCamperVansSortedByPrice() {
        try {
            return $this
                ->createQueryBuilder('r')
                ->orderBy('r.pricePerDay', 'ASC')
                ->getQuery()
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getCampervanMaxRentalPrice() {
        try {
            return $this
                ->createQueryBuilder('r')
                ->select('r.pricePerDay')
                ->orderBy('r.pricePerDay', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleScalarResult()
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public function getCountOfRentals() {
        try {
            return $this
                ->createQueryBuilder('r')
                ->select('count(r.id)')
                ->getQuery()
                ->getSingleScalarResult()
            ;
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }

    public  function findCampervanById($id) {
        try {
            return $this
                ->createQueryBuilder('r')
                ->where('r.id= :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_ARRAY);
        }
        catch(DBALException $e){
            $errorMessage = $e->getMessage();
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
        }

        return $errorMessage;
    }
}
