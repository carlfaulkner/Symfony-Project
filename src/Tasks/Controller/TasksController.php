<?php

namespace App\Tasks\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Tasks\TasksFacade;

final class TasksController extends AbstractController
{
    #[Route('/tasks', name: 'app_tasks')]
    public function tasks(): Response
    {
        $tasks = new TasksFacade();

        $tasks_response = $tasks->listTasks();
              
        $tasks = $tasks_response['data']['tasks'];

        return $this->render('tasks/tasks.html.twig', [
            'title' => 'Tasks',
            'tasks' => $tasks,
        ]);
    }

    #[Route('/tasks/{task_id<\d+>}', name: 'app_task')]
    public function task(int $task_id): Response
    {
        $tasks = new TasksFacade();

        $tasks_response = $tasks->getTask($task_id);

        $task = $tasks_response['data']['tasks'][0];

        return $this->render('tasks/task.html.twig', [
            'title' => $task['title'],
        ]);
    }

    #[Route('/tasks/add', name: 'app_task_add')]
    public function addTask(): Response
    {
        return $this->render('tasks/task-add.html.twig', [
            'title' => 'Add Task',
        ]);
    }
}