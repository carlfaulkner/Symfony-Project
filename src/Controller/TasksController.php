<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TasksController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Home');
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