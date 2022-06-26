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
        $tasks = new TasksApiController();

        $tasks_response = $tasks->getTasks();

        return $this->render('tasks/tasks.html.twig', [
            'title' => 'Tasks',
            'tasks' =>  $tasks_response,
        ]);
    }

    #[Route('/tasks/{task_id}', name: 'app_task')]
    public function task($task_id): Response
    {
        $tasks = new TasksApiController();

        $tasks_response = $tasks->getTask($task_id);

        return $this->render('task/task.html.twig', [
            'title' => $tasks_response['title'],
        ]);
    }
}