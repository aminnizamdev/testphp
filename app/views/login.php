<div class="auth-form">
    <div class="card">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h4 class="card-title fw-bold">Welcome Back!</h4>
                <p class="text-muted">Log in to your TaskMaster account</p>
            </div>
            
            <form id="loginForm" action="/auth/login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_me">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
                
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
                
                <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="/home/register" class="text-primary">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <p class="text-muted small">
            By logging in, you agree to TaskMaster's 
            <a href="#">Terms of Service</a> and 
            <a href="#">Privacy Policy</a>
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Form submission
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, this would authenticate with the server
            alert('In a real application, this would authenticate and redirect to the dashboard!');
            
            // Redirect to the dashboard
            window.location.href = '/task';
        });
    });
</script> 