<?php

namespace App\Controller;

use App\Entity\Main\Salarie2;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;
use Proxies\__CG__\App\Entity\Salarie;

class DefaultController extends AbstractController
{

    private EntityManagerInterface $defaultManager;
    private EntityManagerInterface $secondManager;

    public function __construct(EntityManagerInterface $defaultManager, EntityManagerInterface $secondManager)
    {
        $this->defaultManager = $defaultManager;
        $this->secondManager = $secondManager;
    }
    #[Route('/default', name: 'app_default')]
    public function index(ManagerRegistry $doctrine)
    {
        // Both methods return the default entity manager
        $entityManager = $doctrine->getManager();
        $entityManager = $doctrine->getManager('default')->getRepository(Salarie2::class)->findAll();

        // This method returns instead the "customer" entity manager
        //$s=new Salarie();
        $customerEntityManager = $doctrine->getManager('customer')->getRepository(Salarie::class)->findAll();


        //$s->setNom('islem');
        //$doctrine->getManager('customer')->persist($s);
        //$doctrine->getManager('customer')->flush();
        dd($entityManager,$customerEntityManager);
        // ...
    }
}
