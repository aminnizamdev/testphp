<?php namespace App\Controllers;

class Task extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'TaskMaster - Your Task Management Solution',
            'tasks' => $this->getTaskData()
        ];
        
        return view('header', $data)
             . view('task/dashboard', $data)
             . view('footer');
    }
    
    public function board()
    {
        $data = [
            'title' => 'Task Board - TaskMaster',
            'tasks' => $this->getTaskData()
        ];
        
        return view('header', $data)
             . view('task/board', $data)
             . view('footer');
    }
    
    public function calendar()
    {
        $data = [
            'title' => 'Task Calendar - TaskMaster',
        ];
        
        return view('header', $data)
             . view('task/calendar', $data)
             . view('footer');
    }
    
    public function create()
    {
        $data = [
            'title' => 'Create New Task - TaskMaster',
        ];
        
        return view('header', $data)
             . view('task/create', $data)
             . view('footer');
    }
    
    // Temporary data - in a real app we would use a model
    private function getTaskData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Complete project proposal',
                'description' => 'Finalize the project proposal document with budget and timeline',
                'status' => 'In Progress',
                'priority' => 'High',
                'due_date' => '2023-09-15',
                'assigned_to' => 'John Doe',
                'tags' => ['Documentation', 'Planning']
            ],
            [
                'id' => 2,
                'title' => 'Design homepage mockup',
                'description' => 'Create mockup designs for the new website homepage',
                'status' => 'To Do',
                'priority' => 'Medium',
                'due_date' => '2023-09-20',
                'assigned_to' => 'Jane Smith',
                'tags' => ['Design', 'Frontend']
            ],
            [
                'id' => 3,
                'title' => 'Database optimization',
                'description' => 'Optimize database queries for better performance',
                'status' => 'Done',
                'priority' => 'High',
                'due_date' => '2023-09-10',
                'assigned_to' => 'Mike Johnson',
                'tags' => ['Backend', 'Performance']
            ],
            [
                'id' => 4,
                'title' => 'API integration',
                'description' => 'Integrate payment gateway API',
                'status' => 'In Progress',
                'priority' => 'Medium',
                'due_date' => '2023-09-25',
                'assigned_to' => 'Sarah Williams',
                'tags' => ['Backend', 'API']
            ],
            [
                'id' => 5,
                'title' => 'Update documentation',
                'description' => 'Update user documentation with new features',
                'status' => 'To Do',
                'priority' => 'Low',
                'due_date' => '2023-09-30',
                'assigned_to' => 'John Doe',
                'tags' => ['Documentation']
            ]
        ];
    }
} 