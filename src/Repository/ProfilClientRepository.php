<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04/04/2019
 * Time: 09:55
 */

namespace App\Repository;


use App\Entity\Client;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilClientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function getInfoProfilClient($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('name')
            ->from('client', 'u')
            ->where('id =?1')
            ->setParameter(1,$id);
        return $qb->getQuery()->getArrayResult();
    }

    public function modifyInfoProfilClient($name, $lastname, $email, $password, $description, $phone, $age, $localisation)
    {
        
    }

}