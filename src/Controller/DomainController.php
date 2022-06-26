<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DomainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('homepage/homepage.html.twig', [
            'title' => 'Home Page',
        ]);
    }

    #[Route('/tasks', name: 'app_tasks')]
    public function tasks(): Response
    {
        $tasks = array(
            array(
                'id' => 12,
                'title' => 'test title 12',
                'completed' => 'N',
            ),
            array(
                'id' => 13,
                'title' => 'test title 13',
                'completed' => 'N',
            )
        );

        return $this->render('tasks/tasks.html.twig', [
            'title' => 'Tasks',
            'tasks' =>  $tasks,
        ]);
    }

    #[Route('/tasks/{task_id}', name: 'app_task')]
    public function task($task_id): Response
    {
        return $this->render('task/task.html.twig', [
            'title' => 'Task',
        ]);
    }
}