<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\DBAL\DriverManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Person|null find($id, $lockMode = null, $lockVersion = null)
 * @method Person|null findOneBy(array $criteria, array $orderBy = null)
 * @method Person[]    findAll()
 * @method Person[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    public function findByAllColumn(string $value){
        $fields = $this->getClassMetadata("App\Entity\Person")->getFieldNames();
        $qb = $this->createQueryBuilder('p');
        
        $qb->select('p');
        for($i = 0; $i < count($fields); $i++){
            $qb->orWhere("p.$fields[$i] = :value");
            //$qb->add('orWhere', "p.$fields[$i] = :VALUE$i")->setParameter('VALUE$i', $value);
        }
            $qb->setParameter('value', $value);
            $query = $qb->getQuery()->getResult();
        return $query;
        //dump($cm);

    }

    // /**
    //  * @return Person[] Returns an array of Person objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Person
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
