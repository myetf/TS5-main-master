<?php

namespace App\Repository;


use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Task::class);
    }
}
