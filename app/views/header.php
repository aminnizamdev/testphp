<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TaskMaster' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
    
    <!-- Additional styles for the task board -->
    <style>
        :root {
            --primary-color: #6366F1;
            --secondary-color: #4F46E5;
            --light-color: #F9FAFB;
            --dark-color: #1F2937;
            --success-color: #10B981;
            --warning-color: #F59E0B;
            --danger-color: #EF4444;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F3F4F6;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
        }
        
        .nav-link.active {
            color: var(--primary-color) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .task-card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }
        
        .task-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .status-column {
            min-height: 500px;
            background-color: #F9FAFB;
            border-radius: 8px;
            padding: 15px;
        }
        
        .task-tag {
            font-size: 0.75rem;
            border-radius: 50px;
            padding: 0.25rem 0.75rem;
            margin-right: 0.25rem;
            background-color: #E5E7EB;
            color: #4B5563;
        }
        
        .priority-high {
            border-left: 4px solid var(--danger-color);
        }
        
        .priority-medium {
            border-left: 4px solid var(--warning-color);
        }
        
        .priority-low {
            border-left: 4px solid var(--success-color);
        }
        
        .sidebar {
            background-color: white;
            height: 100vh;
            position: fixed;
            border-right: 1px solid #E5E7EB;
        }
        
        .sidebar-link {
            color: #6B7280;
            text-decoration: none;
            padding: 0.75rem 1rem;
            display: block;
            border-radius: 0.375rem;
            margin-bottom: 0.25rem;
        }
        
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #F3F4F6;
            color: var(--primary-color);
        }
        
        .sidebar-link i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
        
        @media (max-width: 991px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 1px solid #E5E7EB;
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-tasks me-2"></i>TaskMaster
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/pricing">Pricing</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="/home/login" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/home/register" class="btn btn-primary">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- If we're in task pages, show sidebar -->
    <?php if (strpos(current_url(), 'task') !== false): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 p-0 sidebar">
                <div class="p-3 pt-4">
                    <h5 class="mb-3">Dashboard</h5>
                    <div class="mb-4">
                        <a href="/task" class="sidebar-link <?= current_url() == site_url('task') ? 'active' : '' ?>">
                            <i class="fas fa-home"></i> Overview
                        </a>
                        <a href="/task/board" class="sidebar-link <?= current_url() == site_url('task/board') ? 'active' : '' ?>">
                            <i class="fas fa-columns"></i> Board
                        </a>
                        <a href="/task/calendar" class="sidebar-link <?= current_url() == site_url('task/calendar') ? 'active' : '' ?>">
                            <i class="fas fa-calendar"></i> Calendar
                        </a>
                    </div>
                    
                    <h5 class="mb-3">Tasks</h5>
                    <div class="mb-4">
                        <a href="/task/create" class="sidebar-link <?= current_url() == site_url('task/create') ? 'active' : '' ?>">
                            <i class="fas fa-plus"></i> Create Task
                        </a>
                        <a href="#" class="sidebar-link">
                            <i class="fas fa-list"></i> My Tasks
                        </a>
                        <a href="#" class="sidebar-link">
                            <i class="fas fa-users"></i> Team Tasks
                        </a>
                    </div>
                    
                    <h5 class="mb-3">Projects</h5>
                    <div class="mb-4">
                        <a href="#" class="sidebar-link">
                            <i class="fas fa-project-diagram"></i> All Projects
                        </a>
                        <a href="#" class="sidebar-link">
                            <i class="fas fa-plus-circle"></i> New Project
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 main-content">
    <?php else: ?>
    <div class="container mt-4">
    <?php endif; ?> 