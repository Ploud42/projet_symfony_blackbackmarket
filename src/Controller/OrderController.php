<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\User;
use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // creates a order object and initializes some data for this example
        $user = $this->getUser();
        $order = new order();
        $order->setBuyer($user);
        $order->setIsDelivered(0);
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $order = $form->getData();

                // ... perform some action, such as saving the task to the database

                $entityManager->persist($order);
                $entityManager->flush();

                $this->addFlash(
                    'notice',
                    '<div class="alert alert-success" role="alert">Votre annonce a été publiée !</div>'
                );
                return $this->redirectToRoute('app_larceny');
            } else {
                $this->addFlash(
                    'notice',
                    '<div class="alert alert-danger" role="alert"> Une erreur est survenue.</div>'
                );
                return $this->redirectToRoute('app_order');
            }
        }

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
