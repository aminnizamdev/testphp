<?php namespace Config;

class Routes
{
    public function __construct()
    {
        // Default controller
        $this->setDefaultController('Home');
        $this->setDefaultMethod('index');
        
        // Define routes
        $this->add('/', 'Home::index');
        
        // Home routes
        $this->add('home', 'Home::index');
        $this->add('home/features', 'Home::features');
        $this->add('home/pricing', 'Home::pricing');
        $this->add('home/login', 'Home::login');
        $this->add('home/register', 'Home::register');
        
        // Task routes
        $this->add('task', 'Task::index');
        $this->add('task/board', 'Task::board');
        $this->add('task/calendar', 'Task::calendar');
        $this->add('task/create', 'Task::create');
        $this->add('task/store', 'Task::store');
        $this->add('task/edit/(:num)', 'Task::edit/$1');
        $this->add('task/update/(:num)', 'Task::update/$1');
        $this->add('task/delete/(:num)', 'Task::delete/$1');
        
        // Auth routes
        $this->add('auth/login', 'Auth::login');
        $this->add('auth/register', 'Auth::register');
        $this->add('auth/logout', 'Auth::logout');
    }
    
    private $routes = [];
    private $defaultController = 'Home';
    private $defaultMethod = 'index';
    
    public function add($route, $handler)
    {
        $this->routes[$route] = $handler;
    }
    
    public function setDefaultController($controller)
    {
        $this->defaultController = $controller;
    }
    
    public function setDefaultMethod($method)
    {
        $this->defaultMethod = $method;
    }
    
    public function getRoutes()
    {
        return $this->routes;
    }
    
    public function getDefaultController()
    {
        return $this->defaultController;
    }
    
    public function getDefaultMethod()
    {
        return $this->defaultMethod;
    }
} 