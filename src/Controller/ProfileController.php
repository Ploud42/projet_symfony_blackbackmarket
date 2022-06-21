<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orderByList = $orderRepository->findBy(array('seller' => $this->getUser()));
        $orderAll = $orderRepository->findBy(array(
            'seller' => $this->getUser(),
            'buyer' => $this->getUser()
        ));
        return $this->render('profile/index.html.twig', [
            'orderByList' => $orderByList,
            'orderAll' => $orderAll
        ]);
    }
}
