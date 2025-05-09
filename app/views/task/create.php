<!-- Create Task Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Create New Task</h1>
        <p class="text-muted">Add a new task to the system</p>
    </div>
</div>

<!-- Task Creation Form -->
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form id="createTaskForm" action="/task/store" method="post">
            <!-- Task Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Task Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" required>
            </div>
            
            <!-- Task Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter task description"></textarea>
            </div>
            
            <div class="row">
                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" selected disabled>Select status</option>
                        <option value="To Do">To Do</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
                
                <!-- Priority -->
                <div class="col-md-6 mb-3">
                    <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="" selected disabled>Select priority</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <!-- Due Date -->
                <div class="col-md-6 mb-3">
                    <label for="dueDate" class="form-label">Due Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="dueDate" name="due_date" required>
                </div>
                
                <!-- Assigned To -->
                <div class="col-md-6 mb-3">
                    <label for="assignedTo" class="form-label">Assigned To <span class="text-danger">*</span></label>
                    <select class="form-select" id="assignedTo" name="assigned_to" required>
                        <option value="" selected disabled>Select assignee</option>
                        <option value="John Doe">John Doe</option>
                        <option value="Jane Smith">Jane Smith</option>
                        <option value="Mike Johnson">Mike Johnson</option>
                        <option value="Sarah Williams">Sarah Williams</option>
                    </select>
                </div>
            </div>
            
            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="form-label">Tags</label>
                <div class="form-control py-2" id="tagsContainer" style="min-height: 45px; cursor: text;">
                    <div class="d-inline-flex flex-wrap align-items-center" id="tagsList">
                        <!-- Tags will be added here dynamically -->
                    </div>
                    <input type="text" id="tagInput" placeholder="Add a tag and press Enter" class="border-0 outline-0" style="outline: none; width: 50%;">
                </div>
                <input type="hidden" id="tags" name="tags" value="">
                <div class="form-text">Press Enter to add each tag</div>
            </div>
            
            <!-- Attachments -->
            <div class="mb-4">
                <label for="attachments" class="form-label">Attachments</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
                    <label class="input-group-text" for="attachments">
                        <i class="fas fa-paperclip"></i>
                    </label>
                </div>
            </div>
            
            <!-- Related Tasks -->
            <div class="mb-4">
                <label for="relatedTasks" class="form-label">Related Tasks</label>
                <select class="form-select" id="relatedTasks" name="related_tasks[]" multiple>
                    <option value="1">Complete project proposal</option>
                    <option value="2">Design homepage mockup</option>
                    <option value="3">Database optimization</option>
                    <option value="4">API integration</option>
                    <option value="5">Update documentation</option>
                </select>
                <div class="form-text">Hold Ctrl (or Cmd) to select multiple tasks</div>
            </div>
            
            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="/task" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Create Task
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tags input
        const tagsContainer = document.getElementById('tagsContainer');
        const tagInput = document.getElementById('tagInput');
        const tagsList = document.getElementById('tagsList');
        const tagsHiddenInput = document.getElementById('tags');
        const tags = [];
        
        // When clicking on the container, focus the input
        tagsContainer.addEventListener('click', function() {
            tagInput.focus();
        });
        
        // When pressing enter on the input, create a tag
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && tagInput.value.trim() !== '') {
                e.preventDefault();
                
                const tagValue = tagInput.value.trim();
                if (!tags.includes(tagValue)) {
                    tags.push(tagValue);
                    updateTags();
                }
                
                tagInput.value = '';
            }
        });
        
        // Update the UI and hidden input with the current tags
        function updateTags() {
            // Update UI
            tagsList.innerHTML = '';
            tags.forEach(function(tag, index) {
                const tagElement = document.createElement('div');
                tagElement.classList.add('badge', 'bg-light', 'text-dark', 'me-2', 'mb-1', 'p-2');
                tagElement.innerHTML = `
                    ${tag}
                    <button type="button" class="btn-close btn-close-sm ms-2" aria-label="Remove tag" data-index="${index}"></button>
                `;
                tagsList.appendChild(tagElement);
            });
            
            // Update hidden input
            tagsHiddenInput.value = JSON.stringify(tags);
            
            // Add event listeners to remove buttons
            document.querySelectorAll('.btn-close').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const index = parseInt(this.getAttribute('data-index'));
                    tags.splice(index, 1);
                    updateTags();
                });
            });
        }
        
        // Initialize form submission
        const form = document.getElementById('createTaskForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, this would submit to the server
            alert('In a real application, this would create a new task and redirect to the task board!');
            
            // Redirect to the task board
            window.location.href = '/task/board';
        });
    });
</script> 