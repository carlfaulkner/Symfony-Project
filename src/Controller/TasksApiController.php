<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TasksApiController extends AbstractController
{
    #[Route('/api/tasks/{id<\d+>}', methods: ['GET'])]

    public function getTasks(int $id): Response
    {
        $tasks = [
            'id' => $id,
            'title' => 'test title',
        ];

        return $this->json($tasks);
    }
}