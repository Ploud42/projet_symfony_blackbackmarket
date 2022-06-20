<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LarcenyController extends AbstractController
{
    #[Route('/larceny', name: 'app_larceny')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orderList = $orderRepository->findAll();
        return $this->render('larceny/index.html.twig', [
            'orderList' => $orderList,
        ]);
    }
}
