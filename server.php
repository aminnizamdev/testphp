<?php
/**
 * Simple PHP Server for TaskMaster
 * 
 * This file provides a simple server implementation for testing the TaskMaster application.
 * In a production environment, you would use a proper web server like Apache or Nginx.
 */

// Set the document root
$documentRoot = __DIR__;

// Get the requested URI
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Serve static files directly
if ($uri !== '/' && file_exists($documentRoot . '/public' . $uri)) {
    // Get the file extension
    $extension = pathinfo($uri, PATHINFO_EXTENSION);
    
    // Set the content type
    switch ($extension) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
        case 'png':
        case 'jpg':
        case 'jpeg':
        case 'gif':
            header('Content-Type: image/' . $extension);
            break;
    }
    
    // Serve the file
    readfile($documentRoot . '/public' . $uri);
    exit;
}

// Forward everything else to index.php
require_once $documentRoot . '/public/index.php'; 