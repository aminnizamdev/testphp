<div class="auth-form">
    <div class="card">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h4 class="card-title fw-bold">Create an Account</h4>
                <p class="text-muted">Join TaskMaster to manage your tasks efficiently</p>
            </div>
            
            <form id="registerForm" action="/auth/register" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="form-text">Must be at least 8 characters with a mix of letters, numbers, and symbols</div>
                </div>
                
                <div class="mb-4">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                
                <div class="mb-4 form-check">
                    <input class="form-check-input" type="checkbox" id="agreeTerms" name="agree_terms" required>
                    <label class="form-check-label" for="agreeTerms">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                </div>
                
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
                
                <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="/home/login" class="text-primary">Log in</a></p>
                </div>
            </form>
        </div>
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
        
        // Form validation
        const form = document.getElementById('registerForm');
        const confirmPassword = document.getElementById('confirmPassword');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check if passwords match
            if (password.value !== confirmPassword.value) {
                alert('Passwords do not match!');
                return;
            }
            
            // In a real application, this would register the user
            alert('In a real application, this would register your account and redirect to the dashboard!');
            
            // Redirect to the dashboard
            window.location.href = '/task';
        });
    });
</script> 