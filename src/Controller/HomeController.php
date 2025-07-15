<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TicketRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/tickets', name: 'ticket_index')]
    public function index(TicketRepository $repo): Response
    {
        $tickets = $repo->findOpen();
        return $this->render('home/index.html.twig', compact('tickets'));
    }
}
