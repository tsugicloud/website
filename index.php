<?php
require_once 'master.php';
master::head();
master::navbar();
?>
<body class="bg-light">
    <!-- Hero Section -->
    <div class="container-fluid px-0">
        <div class="position-relative">
            <div class="hero-section bg-primary text-white py-5" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
                <div class="container py-5">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold mb-4">Welcome to Tsugicloud</h1>
                            <p class="lead mb-4">Your all-in-one platform for educational tools and LTI integration. Build, deploy, and scale your learning applications with ease.</p>
                            <div class="d-flex gap-3">
                                <a href="<?= $APP_HOME ?>tsugi" class="btn btn-light btn-lg px-4">Get Started</a>
                                <a href="<?= $APP_HOME ?>about/documentation/howto" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/ArtAndFeminism_MoMA18_-_30_-_Editing_with_Megan_Wacha.jpg/1024px-ArtAndFeminism_MoMA18_-_30_-_Editing_with_Megan_Wacha.jpg" 
                                 alt="Education Technology" class="img-fluid rounded-3 shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-3 p-3">
                            <i class="bi bi-cloud-check"></i>
                        </div>
                        <h3 class="card-title h4">Cloud-Powered</h3>
                        <p class="card-text">Host your educational tools in the cloud with enterprise-grade reliability and scalability.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-3 p-3">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="card-title h4">Secure & Private</h3>
                        <p class="card-text">Your data stays on your server. No third-party requirements, no data breaches.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-3 mb-3 p-3">
                            <i class="bi bi-puzzle"></i>
                        </div>
                        <h3 class="card-title h4">LTI Compatible</h3>
                        <p class="card-text">Seamless integration with your favorite LMS, including Canvas, Sakai, and Brightspace.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Community Section -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">Join Our Community</h2>
                <p class="lead mb-4">Be part of a growing community of educators and developers building the future of educational technology.</p>
                <div class="d-flex gap-3">
                    <a href="https://github.com/tsugiproject" target="_blank" class="btn btn-outline-primary btn-lg px-4">Installing Tsugi</a>
                    <a href="https://github.com/tsugitools" target="_blank" class="btn btn-outline-primary btn-lg px-4">Tsugi Tools</a>
                    <a href="https://www.tsugi.org" target="_blank" class="btn btn-primary btn-lg px-4">Developing Tools</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Junction_2015.jpg/1024px-Junction_2015.jpg" 
                     alt="Community" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container-fluid bg-primary text-white py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-4">Ready to Get Started?</h2>
                    <p class="lead mb-4">Start using free educational tools today with Tsugicloud.</p>
                    <a href="<?= $APP_HOME ?>tsugi" class="btn btn-light btn-lg px-5">Free Account</a>
                </div>
            </div>
        </div>
    </div>

    <?php master::footer(); ?>
</body>
</html>
