<?php 

declare(strict_types=1);

namespace App\Homepage\Domain;

use Symfony\Component\HttpClient\HttpClient;

final class Homepage
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

    public function topTasks(): array
    {
        $response = $this->client->request('GET', 'https://api.clickwebsitebuilder.com/v1/tasks?page=1&limit=8',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->access_token
                ]
            ]
        );

        //$content = $response->getContent();
   
        $this->json_response = $response->toArray();

        return $this->json_response;
    }
}
