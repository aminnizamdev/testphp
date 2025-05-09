<!-- Calendar Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Task Calendar</h1>
        <p class="text-muted">View your tasks in a calendar format</p>
    </div>
    <div>
        <a href="/task/create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Task
        </a>
    </div>
</div>

<!-- Calendar Controls -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary">Today</button>
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <h4 class="mb-0"><?= date('F Y') ?></h4>
            </div>
            <div class="col-md-4 text-end">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-secondary active">Month</button>
                    <button type="button" class="btn btn-outline-secondary">Week</button>
                    <button type="button" class="btn btn-outline-secondary">Day</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Calendar View -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead>
                <tr class="bg-light text-center">
                    <th width="14.28%">Sunday</th>
                    <th width="14.28%">Monday</th>
                    <th width="14.28%">Tuesday</th>
                    <th width="14.28%">Wednesday</th>
                    <th width="14.28%">Thursday</th>
                    <th width="14.28%">Friday</th>
                    <th width="14.28%">Saturday</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Get the first day of the current month
                    $date = new DateTime('first day of this month');
                    
                    // Get the day of the week for the first day (0 = Sunday, 6 = Saturday)
                    $firstDayOfWeek = (int)$date->format('w');
                    
                    // Get the number of days in the current month
                    $daysInMonth = (int)date('t');
                    
                    // Calculate the number of weeks we need to display
                    $weeksInMonth = ceil(($firstDayOfWeek + $daysInMonth) / 7);
                    
                    // Current day
                    $currentDay = 1;
                    
                    // Group tasks by date
                    $tasksByDate = [];
                    
                    foreach ($tasks as $task) {
                        $date = $task['due_date'];
                        if (!isset($tasksByDate[$date])) {
                            $tasksByDate[$date] = [];
                        }
                        $tasksByDate[$date][] = $task;
                    }
                    
                    // Loop through each week
                    for ($week = 0; $week < $weeksInMonth; $week++) {
                        echo '<tr class="calendar-row" style="height: 120px;">';
                        
                        // Loop through each day of the week
                        for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                            // Calculate which day we're on
                            $dayNumber = $week * 7 + $dayOfWeek - $firstDayOfWeek + 1;
                            
                            // Determine if this cell belongs to the current month
                            if ($dayNumber < 1 || $dayNumber > $daysInMonth) {
                                echo '<td class="text-muted bg-light">&nbsp;</td>';
                            } else {
                                // Format the date for comparison with tasks
                                $formattedDate = date('Y-m-') . str_pad($dayNumber, 2, '0', STR_PAD_LEFT);
                                
                                // Check if the current day is today
                                $isToday = (date('j') == $dayNumber && date('m') == date('m') && date('Y') == date('Y'));
                                
                                echo '<td class="' . ($isToday ? 'bg-light-primary' : '') . '">';
                                echo '<div class="d-flex justify-content-between mb-1">';
                                echo '<span class="' . ($isToday ? 'badge rounded-pill bg-primary' : '') . '">' . $dayNumber . '</span>';
                                echo '</div>';
                                
                                // Display tasks for this day
                                if (isset($tasksByDate[$formattedDate])) {
                                    foreach ($tasksByDate[$formattedDate] as $task) {
                                        $priorityClass = 'bg-success';
                                        if ($task['priority'] == 'High') {
                                            $priorityClass = 'bg-danger';
                                        } elseif ($task['priority'] == 'Medium') {
                                            $priorityClass = 'bg-warning text-dark';
                                        }
                                        
                                        echo '<div class="calendar-task p-1 mb-1 rounded ' . $priorityClass . '">';
                                        echo '<small class="d-block text-white text-truncate" title="' . htmlspecialchars($task['title']) . '">';
                                        echo htmlspecialchars($task['title']);
                                        echo '</small>';
                                        echo '</div>';
                                    }
                                }
                                
                                echo '</td>';
                            }
                        }
                        
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Task Details -->
<div class="modal fade" id="taskDetailsModal" tabindex="-1" aria-labelledby="taskDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskDetailsModalLabel">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 id="taskTitle">Task Title</h5>
                <p class="text-muted" id="taskDescription">Task description will appear here.</p>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Status:</strong> <span id="taskStatus">Status</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Priority:</strong> <span id="taskPriority">Priority</span></p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Due Date:</strong> <span id="taskDueDate">Due Date</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Assigned To:</strong> <span id="taskAssignee">Assignee</span></p>
                    </div>
                </div>
                
                <div class="mb-3">
                    <p><strong>Tags:</strong></p>
                    <div id="taskTags">
                        <!-- Tags will be added here -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit Task</button>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-primary {
        background-color: rgba(99, 102, 241, 0.1);
    }
    
    .calendar-task {
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.8rem;
    }
    
    .calendar-task:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // In a real app, this would trigger a modal with the task details
        const calendarTasks = document.querySelectorAll('.calendar-task');
        calendarTasks.forEach(task => {
            task.addEventListener('click', function() {
                // Show the modal
                const taskModal = new bootstrap.Modal(document.getElementById('taskDetailsModal'));
                taskModal.show();
            });
        });
    });
</script> 