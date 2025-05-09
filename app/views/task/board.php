<!-- Board Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Task Board</h1>
        <p class="text-muted">Manage your tasks in a Kanban-style board</p>
    </div>
    <div class="d-flex">
        <div class="dropdown me-2">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter me-2"></i> Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><h6 class="dropdown-header">By Priority</h6></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-circle text-danger me-2"></i> High</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-circle text-warning me-2"></i> Medium</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-circle text-success me-2"></i> Low</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><h6 class="dropdown-header">By Assignee</h6></li>
                <li><a class="dropdown-item" href="#">John Doe</a></li>
                <li><a class="dropdown-item" href="#">Jane Smith</a></li>
                <li><a class="dropdown-item" href="#">Mike Johnson</a></li>
            </ul>
        </div>
        <div class="dropdown me-2">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-sort me-2"></i> Sort
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="#">Due Date (Asc)</a></li>
                <li><a class="dropdown-item" href="#">Due Date (Desc)</a></li>
                <li><a class="dropdown-item" href="#">Priority (High-Low)</a></li>
                <li><a class="dropdown-item" href="#">Priority (Low-High)</a></li>
                <li><a class="dropdown-item" href="#">Title (A-Z)</a></li>
            </ul>
        </div>
        <a href="/task/create" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> New Task
        </a>
    </div>
</div>

<!-- Task Board -->
<div class="row g-4">
    <!-- To Do Column -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-info">
                    <i class="fas fa-clipboard-list me-2"></i> To Do
                </h5>
                <span class="badge bg-info rounded-pill">
                    <?php 
                        $todoCount = 0;
                        foreach($tasks as $task) {
                            if($task['status'] === 'To Do') $todoCount++;
                        }
                        echo $todoCount;
                    ?>
                </span>
            </div>
            <div class="card-body p-3 status-column">
                <?php foreach($tasks as $task): ?>
                    <?php if($task['status'] === 'To Do'): ?>
                        <div class="card task-card mb-3 priority-<?= strtolower($task['priority']) ?>">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="card-title mb-0"><?= $task['title'] ?></h6>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-right me-2"></i> Move to In Progress</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text small text-muted mb-3"><?= substr($task['description'], 0, 100) . (strlen($task['description']) > 100 ? '...' : '') ?></p>
                                <div class="mb-3">
                                    <?php foreach($task['tags'] as $tag): ?>
                                        <span class="task-tag"><?= $tag ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-<?= ($task['priority'] == 'High') ? 'danger' : (($task['priority'] == 'Medium') ? 'warning text-dark' : 'success') ?>">
                                            <?= $task['priority'] ?>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">
                                            <i class="far fa-calendar-alt me-1"></i> 
                                            <?= $task['due_date'] ?>
                                        </small>
                                        <div class="avatar avatar-sm bg-primary text-white rounded-circle" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $task['assigned_to'] ?>">
                                            <?= substr($task['assigned_to'], 0, 1) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- In Progress Column -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-warning">
                    <i class="fas fa-spinner me-2"></i> In Progress
                </h5>
                <span class="badge bg-warning text-dark rounded-pill">
                    <?php 
                        $inProgressCount = 0;
                        foreach($tasks as $task) {
                            if($task['status'] === 'In Progress') $inProgressCount++;
                        }
                        echo $inProgressCount;
                    ?>
                </span>
            </div>
            <div class="card-body p-3 status-column">
                <?php foreach($tasks as $task): ?>
                    <?php if($task['status'] === 'In Progress'): ?>
                        <div class="card task-card mb-3 priority-<?= strtolower($task['priority']) ?>">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="card-title mb-0"><?= $task['title'] ?></h6>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-left me-2"></i> Move to To Do</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-right me-2"></i> Move to Done</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text small text-muted mb-3"><?= substr($task['description'], 0, 100) . (strlen($task['description']) > 100 ? '...' : '') ?></p>
                                <div class="mb-3">
                                    <?php foreach($task['tags'] as $tag): ?>
                                        <span class="task-tag"><?= $tag ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-<?= ($task['priority'] == 'High') ? 'danger' : (($task['priority'] == 'Medium') ? 'warning text-dark' : 'success') ?>">
                                            <?= $task['priority'] ?>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">
                                            <i class="far fa-calendar-alt me-1"></i> 
                                            <?= $task['due_date'] ?>
                                        </small>
                                        <div class="avatar avatar-sm bg-primary text-white rounded-circle" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $task['assigned_to'] ?>">
                                            <?= substr($task['assigned_to'], 0, 1) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Done Column -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-success">
                    <i class="fas fa-check-circle me-2"></i> Done
                </h5>
                <span class="badge bg-success rounded-pill">
                    <?php 
                        $doneCount = 0;
                        foreach($tasks as $task) {
                            if($task['status'] === 'Done') $doneCount++;
                        }
                        echo $doneCount;
                    ?>
                </span>
            </div>
            <div class="card-body p-3 status-column">
                <?php foreach($tasks as $task): ?>
                    <?php if($task['status'] === 'Done'): ?>
                        <div class="card task-card mb-3 priority-<?= strtolower($task['priority']) ?>">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="card-title mb-0"><?= $task['title'] ?></h6>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-left me-2"></i> Move to In Progress</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text small text-muted mb-3"><?= substr($task['description'], 0, 100) . (strlen($task['description']) > 100 ? '...' : '') ?></p>
                                <div class="mb-3">
                                    <?php foreach($task['tags'] as $tag): ?>
                                        <span class="task-tag"><?= $tag ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-<?= ($task['priority'] == 'High') ? 'danger' : (($task['priority'] == 'Medium') ? 'warning text-dark' : 'success') ?>">
                                            <?= $task['priority'] ?>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">
                                            <i class="far fa-calendar-alt me-1"></i> 
                                            <?= $task['due_date'] ?>
                                        </small>
                                        <div class="avatar avatar-sm bg-primary text-white rounded-circle" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $task['assigned_to'] ?>">
                                            <?= substr($task['assigned_to'], 0, 1) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Drag-and-drop Script (placeholder, would need a real implementation) -->
<script>
    // This would be replaced with actual drag-and-drop implementation in a real app
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Task board initialized');
        // In a real implementation, we would initialize drag-and-drop library here
    });
</script> 