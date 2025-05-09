<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'TaskMaster - Your Task Management Solution'
        ];
        
        return view('header', $data)
             . view('home', $data)
             . view('footer');
    }
    
    public function features()
    {
        $data = [
            'title' => 'Features - TaskMaster'
        ];
        
        return view('header', $data)
             . view('features', $data)
             . view('footer');
    }
    
    public function pricing()
    {
        $data = [
            'title' => 'Pricing - TaskMaster'
        ];
        
        return view('header', $data)
             . view('pricing', $data)
             . view('footer');
    }
    
    public function login()
    {
        $data = [
            'title' => 'Login - TaskMaster'
        ];
        
        return view('header', $data)
             . view('login', $data)
             . view('footer');
    }
    
    public function register()
    {
        $data = [
            'title' => 'Register - TaskMaster'
        ];
        
        return view('header', $data)
             . view('register', $data)
             . view('footer');
    }
} 