<?php namespace App\Controllers;

class BaseController
{
    protected $request;
    protected $helpers = [];

    public function __construct()
    {
        // Do Not Edit This Line
        $this->request = \Config\Services::request();
        
        // Load helpers
        helper(['url', 'form']);
    }

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do not edit this line
        $this->response = $response;
        $this->logger = $logger;
    }
} 