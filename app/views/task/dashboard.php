<!-- Dashboard Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Dashboard</h1>
        <p class="text-muted">Welcome back! Here's an overview of your tasks</p>
    </div>
    <div>
        <a href="/task/create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Task
        </a>
    </div>
</div>

<!-- Dashboard Stats -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-tasks fa-2x text-primary"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="text-muted fw-normal mb-0">Total Tasks</h6>
                        <h2 class="fw-bold mb-0">
                            <?= count($tasks) ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-check-circle fa-2x text-success"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="text-muted fw-normal mb-0">Completed</h6>
                        <h2 class="fw-bold mb-0">
                            <?php 
                                $completed = array_filter($tasks, function($task) {
                                    return $task['status'] === 'Done';
                                });
                                echo count($completed);
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-spinner fa-2x text-warning"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="text-muted fw-normal mb-0">In Progress</h6>
                        <h2 class="fw-bold mb-0">
                            <?php 
                                $inProgress = array_filter($tasks, function($task) {
                                    return $task['status'] === 'In Progress';
                                });
                                echo count($inProgress);
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-hourglass-start fa-2x text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h6 class="text-muted fw-normal mb-0">To Do</h6>
                        <h2 class="fw-bold mb-0">
                            <?php 
                                $todo = array_filter($tasks, function($task) {
                                    return $task['status'] === 'To Do';
                                });
                                echo count($todo);
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Tasks -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Recent Tasks</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Status</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $task): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0"><?= $task['title'] ?></h6>
                                        <small class="text-muted"><?= substr($task['description'], 0, 50) ?>...</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php
                                    switch($task['priority']) {
                                        case 'High':
                                            echo '<span class="badge bg-danger">High</span>';
                                            break;
                                        case 'Medium':
                                            echo '<span class="badge bg-warning text-dark">Medium</span>';
                                            break;
                                        case 'Low':
                                            echo '<span class="badge bg-success">Low</span>';
                                            break;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    switch($task['status']) {
                                        case 'To Do':
                                            echo '<span class="badge bg-info">To Do</span>';
                                            break;
                                        case 'In Progress':
                                            echo '<span class="badge bg-warning text-dark">In Progress</span>';
                                            break;
                                        case 'Done':
                                            echo '<span class="badge bg-success">Done</span>';
                                            break;
                                    }
                                ?>
                            </td>
                            <td><?= $task['due_date'] ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="avatar avatar-sm bg-primary text-white rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                            <?= substr($task['assigned_to'], 0, 1) ?>
                                        </div>
                                    </div>
                                    <div><?= $task['assigned_to'] ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Task Distribution and Upcoming Deadlines -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Task Distribution</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-center">
                        <i class="fas fa-chart-pie fa-5x text-muted mb-3"></i>
                        <p>In a real application, this would show a chart of task distribution by status, priority, or assignee.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Upcoming Deadlines</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <?php 
                        usort($tasks, function($a, $b) {
                            return strtotime($a['due_date']) - strtotime($b['due_date']);
                        });
                        
                        $count = 0;
                        foreach($tasks as $task): 
                            if($task['status'] !== 'Done' && $count < 5):
                                $count++;
                    ?>
                    <li class="list-group-item px-3 py-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0"><?= $task['title'] ?></h6>
                            <small class="text-<?= (strtotime($task['due_date']) < time()) ? 'danger' : 'muted' ?>">
                                <?= $task['due_date'] ?>
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-<?= ($task['priority'] == 'High') ? 'danger' : (($task['priority'] == 'Medium') ? 'warning' : 'success') ?>">
                                    <?= $task['priority'] ?>
                                </span>
                                <span class="badge bg-<?= ($task['status'] == 'To Do') ? 'info' : 'warning' ?> ms-1">
                                    <?= $task['status'] ?>
                                </span>
                            </div>
                            <small class="text-muted"><?= $task['assigned_to'] ?></small>
                        </div>
                    </li>
                    <?php 
                            endif;
                        endforeach; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div> 