<?php

namespace App\Homepage\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Homepage\HomepageFacade;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tasks = new HomepageFacade();

        $top_tasks = $tasks->topTasks();

        $tasks = $top_tasks['data']['tasks'];

        return $this->render('homepage/homepage.html.twig', [
            'title' => 'Home Page',
            'tasks' => $tasks
        ]);
    }
}