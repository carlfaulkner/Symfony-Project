<?php
declare(strict_types=1);

use Symfony\Component\HttpClient\HttpClient;

final class Tasks
{
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

    public function getTasks(int $id, LoggerInterface $logger): Response
    {
        $logger->info('Returning API response for task {task}',[
            'task' => $id,
        ]);

        $response = $this->client->request('GET', 'https://api.clickwebsitebuilder.com/v1/tasks',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->access_token
                ]
            ]
        );

        $this->json_response = $response->toArray();

        return $this->json_response;
    }
}