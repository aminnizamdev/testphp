<?php

/**
 * Simple bootstrap file for TaskMaster application
 */

// Define path constants
define('ROOTPATH', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', ROOTPATH . 'system' . DIRECTORY_SEPARATOR);
define('VIEWPATH', APPPATH . 'views' . DIRECTORY_SEPARATOR);
define('WRITABLEPATH', ROOTPATH . 'writable' . DIRECTORY_SEPARATOR);

// Auto-load necessary files
require_once SYSTEMPATH . 'Config/Services.php';
require_once SYSTEMPATH . 'HTTP/Interfaces.php';
require_once SYSTEMPATH . 'Log/LoggerInterface.php';

// Support functions
function view($name, $data = [])
{
    // Extract variables into current symbol table from data array
    extract($data);
    
    // Include the view file
    $viewFile = VIEWPATH . $name . '.php';
    if (file_exists($viewFile)) {
        ob_start();
        include($viewFile);
        return ob_get_clean();
    } else {
        return "View file not found: {$viewFile}";
    }
}

function helper($helpers)
{
    foreach ($helpers as $helper) {
        // This is a simplified version without actual helper loading
    }
}

function current_url()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $serverName = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    
    return $protocol . $serverName . $uri;
}

function site_url($path = '')
{
    $baseUrl = 'http://localhost:8080';
    return $baseUrl . '/' . ltrim($path, '/');
}

function env($key, $default = null)
{
    // Simplified env function
    return $default;
}

// Load routes
if (file_exists(APPPATH . 'Config/Routes.php')) {
    require_once APPPATH . 'Config/Routes.php';
    $routes = new Config\Routes();
} else {
    // Create an empty routes object if the file doesn't exist
    $routes = new stdClass();
    $routes->getRoutes = function() { return []; };
    $routes->getDefaultController = function() { return 'Home'; };
    $routes->getDefaultMethod = function() { return 'index'; };
}

// Simplified routing mechanism
function route_request()
{
    global $routes;
    
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/');
    
    if (empty($uri)) {
        $uri = '/';
    }
    
    $allRoutes = $routes->getRoutes();
    
    if ($uri === '/') {
        $handler = $allRoutes['/'] ?? $routes->getDefaultController() . '::' . $routes->getDefaultMethod();
    } else {
        // Check for direct match
        $handler = $allRoutes[$uri] ?? null;
        
        // Check for parameterized routes
        if ($handler === null) {
            foreach ($allRoutes as $route => $h) {
                $pattern = '/' . str_replace(['(', ')', ':num'], ['(', ')?', '(\d+)'], $route) . '/';
                if (preg_match($pattern, $uri, $matches)) {
                    array_shift($matches); // Remove full match
                    $handler = preg_replace('/\$(\d+)/', '${1}', $h);
                    
                    foreach ($matches as $i => $match) {
                        $handler = str_replace('$' . ($i + 1), $match, $handler);
                    }
                    
                    break;
                }
            }
        }
    }
    
    if ($handler) {
        list($controller, $method) = explode('::', $handler);
        
        // Load controller
        $controllerFile = APPPATH . 'controllers/' . $controller . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            
            $controllerClass = "App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerClass();
            
            if (method_exists($controllerInstance, $method)) {
                echo $controllerInstance->$method();
                return;
            }
        }
    }
    
    // If we get here, no route was found
    echo "404 - Page not found";
} 