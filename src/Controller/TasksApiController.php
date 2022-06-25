<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class TasksApiController extends AbstractController
{
    #[Route('/api/tasks/{id<\d+>}', methods: ['GET'])]

    public function getTasks(int $id, LoggerInterface $logger): Response
    {
        $tasks = [
            'id' => $id,
            'title' => 'test title',
        ];

        $logger->info('Returning API response for task {task}',[
            'task' => $id,
        ]);

        return $this->json($tasks);
    }
}