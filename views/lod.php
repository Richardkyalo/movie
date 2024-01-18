<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Classic Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom styles here */
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;
        }
        .carousel-item {
            padding: 30px;
        }
        .card {
            border: none;
            background: #fff;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Classic Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-group">
                    <div class="card">
                        <img src="./images/2.jpg" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title">Image 1</h5>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/2.jpg" class="card-img-top" alt="Image 2">
                        <div class="card-body">
                            <h5 class="card-title">Image 2</h5>
                        </div>
                    </div>
                    <div class="card">
                        <img src="./images/2.jpg" class="card-img-top" alt="Image 3">
                        <div class="card-body">
                            <h5 class="card-title">Image 3</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <!-- Add more cards for the second group of images -->
                <!-- Example:
                <div class="card-group">
                    <div class="card">
                        <!-- Card content for the second image group -->
                    </div>
                    <div class="card">
                        <!-- Card content for the second image group -->
                    </div>
                    <div class="card">
                        <!-- Card content for the second image group -->
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <p>&copy; 2023 Classic Page</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
