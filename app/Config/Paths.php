<?php namespace Config;

class Paths
{
    public $systemDirectory = __DIR__ . '/../../system';
    
    public $appDirectory = __DIR__ . '/..';
    
    public $viewDirectory = __DIR__ . '/../views';
    
    public $writableDirectory = __DIR__ . '/../../writable';
    
    public $testsDirectory = __DIR__ . '/../../tests';
    
    public function __construct()
    {
        // Do not edit below this line unless you know what you are doing
        $this->systemDirectory = rtrim($this->systemDirectory, '/ \\');
        $this->appDirectory = rtrim($this->appDirectory, '/ \\');
        $this->viewDirectory = rtrim($this->viewDirectory, '/ \\');
        $this->writableDirectory = rtrim($this->writableDirectory, '/ \\');
        $this->testsDirectory = rtrim($this->testsDirectory, '/ \\');
    }
} 