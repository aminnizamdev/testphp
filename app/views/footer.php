            <?php if (strpos(current_url(), 'task') !== false): ?>
            </div> <!-- End main-content -->
        </div> <!-- End row -->
    </div> <!-- End container-fluid -->
    <?php else: ?>
    </div> <!-- End container -->
    <?php endif; ?>

    <!-- Footer -->
    <footer class="bg-white mt-5 py-4 border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5><i class="fas fa-tasks me-2"></i>TaskMaster</h5>
                    <p class="text-muted">The ultimate task management solution for teams and individuals.</p>
                    <div class="social-icons">
                        <a href="#" class="text-secondary me-2"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-secondary me-2"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-secondary me-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-secondary"><i class="fab fa-github fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-3 mb-md-0">
                    <h6 class="fw-bold">Product</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Features</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Pricing</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Integrations</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Updates</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3 mb-md-0">
                    <h6 class="fw-bold">Resources</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Documentation</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Tutorials</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Blog</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3 mb-md-0">
                    <h6 class="fw-bold">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">About</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Careers</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Investors</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold">Legal</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Privacy</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Terms</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Security</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">&copy; <?= date('Y') ?> TaskMaster. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery (required for some plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Initialize Bootstrap popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });
    </script>
</body>
</html> 