<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Cinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<style>
    .card-img-top {
        height: 200px; /* Set the desired height for all images */
        object-fit: cover; /* Maintain aspect ratio and cover the entire space */
    } 
</style>
<body>

<!-- Static top navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Our Cinema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Theatres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero section -->
<div class="container text-center mt-5">
    <h1>Welcome to Our Cinema</h1>
    <p>Experience the latest movies and theatre displays</p>
</div>

<!-- Latest Movies Section -->
<<!-- Latest Movies Section -->
<div class="container mt-5">
    <h2>Latest Movies</h2>
    <div class="card-group">
        <div class="card" style="width: 18rem;">
            <img src="./images/534.jpg" class="card-img-top" alt="Movie 1">
            <div class="card-body">
                <h5 class="card-title">Movie Title 1</h5>
                <p class="card-text">Description of the movie goes here.</p>
                <!-- Button for booking -->
                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
            <div class="card-footer">
                <!-- Rating stars -->
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/55.jpg" class="card-img-top" alt="Movie 2">
            <div class="card-body">
                <h5 class="card-title">Movie Title 2</h5>
                <p class="card-text">Description of the movie goes here.</p>
                <!-- Button for booking -->
                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
            <div class="card-footer">
                <!-- Rating stars -->
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/66.jpg" class="card-img-top" alt="Movie 3">
            <div class="card-body">
                <h5 class="card-title">Movie Title 3</h5>
                <p class="card-text">Description of the movie goes here.</p>
                <!-- Button for booking -->
                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
            <div class="card-footer">
                <!-- Rating stars -->
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Theatre Displays Section -->
<div class="container mt-5">
    <h2>Theatre Displays</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4" style="width: 18rem;">
                <img src="./images/2.jpg" class="card-img-top" alt="Theatre 1">
                <div class="card-body">
                    <h5 class="card-title">Theatre Title 1</h5>
                    <p class="card-text">Description of the theatre display goes here.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4" style="width: 18rem;">
                <img src="./images/2.jpg" class="card-img-top" alt="Theatre 2">
                <div class="card-body">
                    <h5 class="card-title">Theatre Title 2</h5>
                    <p class="card-text">Description of the theatre display goes here.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4" style="width: 18rem;">
                <img src="./images/2.jpg" class="card-img-top" alt="Theatre 3">
                <div class="card-body">
                    <h5 class="card-title">Theatre Title 3</h5>
                    <p class="card-text">Description of the theatre display goes here.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-3">
    <div class="container">
        <p>&copy; 2023 Our Cinema</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
