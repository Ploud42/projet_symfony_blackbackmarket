<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/larceny/{id}', name: 'app_singleLarceny')]
    public function updateOrder(OrderRepository $orderRepository, EntityManagerInterface $entityManager, $id): Response
    {
        $order = $orderRepository->find($id);
        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id ' . $id
            );
        }
        if ($order->getSeller() == NULL) {
            $user = $this->getUser();
            $order->setSeller($user);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                '<div class="alert alert-success" role="alert">Vous avez reservé ' . $order->getProduct() . ' !</div>'
            );
        } else {
            $this->addFlash(
                'notice',
                '<div class="alert alert-danger" role="alert">' . $order->getProduct() . ' n\'est plus disponible.</div>'
            );
        }
        return $this->redirectToRoute('app_larceny', [
            'id' => $id,
        ]);
    }
}
