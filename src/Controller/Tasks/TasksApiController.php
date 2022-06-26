<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Psr\Log\LoggerInterface;

class TasksApiController extends AbstractController
{
    #[Route('/api/tasks/{id<\d+>}', methods: ['GET'])]

    public $json_response;
    private $access_token;
    private $username = 'carl';
    private $password = 'paradiddle100';
    private $client;
    private $title;

    public function __construct()
    {
        $httpclient = new HttpClient();

        $this->client = $httpclient->create();

        $this->getAccessToken();
    }

    public function getAccessToken()
    {
        $data = array(
            'username' => $this->username,
            'password' => $this->password
        );

        $response = $this->client->request('POST', 'https://api.clickwebsitebuilder.com/v1/sessions',
            [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($data)
            ]
        );

        //$statusCode = $response->getStatusCode();

        $content = $response->toArray();

        $this->access_token = $content['data']['access_token'];
    }

    public function getTasks()
    {
        $response = $this->client->request('GET', 'https://api.clickwebsitebuilder.com/v1/tasks',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->access_token
                ]
            ]
        );

        $this->json_response = $response->toArray();

        return $this->json_response['data']['tasks'];
    }
    
    public function getTask(int $task_id)
    {
        $response = $this->client->request('GET', 'https://api.clickwebsitebuilder.com/v1/tasks/'.$task_id,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->access_token
                ]
            ]
        );

        $this->json_response = $response->toArray();

        return $this->json_response['data']['tasks'][0];
    }
}