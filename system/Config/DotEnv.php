<?php namespace CodeIgniter\Config;

/**
 * Simplified DotEnv class
 */
class DotEnv
{
    /**
     * The directory where the .env file can be located.
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Load the .env file and set the environment variables
     *
     * @return boolean
     */
    public function load(): bool
    {
        // Simplified implementation - in a real app, this would parse the .env file
        return true;
    }
} 