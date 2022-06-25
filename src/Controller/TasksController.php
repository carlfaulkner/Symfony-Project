<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TasksController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return $this->render('homepage/homepage.html.twig', [
            'title' => 'Home Page',
        ]);
    }

    #[Route('/tasks')]
    public function tasks(): Response
    {
        return new Response('Tasks');
    }

    #[Route('/tasks/{task_id}')]
    public function task($task_id): Response
    {
        return new Response('Task: '.$task_id);
    }
}