<?php namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // In a real app, we would authenticate the user here
        return 'Login successful!';
    }
    
    public function register()
    {
        // In a real app, we would register the user here
        return 'Registration successful!';
    }
    
    public function logout()
    {
        // In a real app, we would log the user out here
        return 'Logged out successfully!';
    }
} 