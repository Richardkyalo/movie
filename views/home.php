<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Richards</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

  <!-- font awesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    #video-container {
      position: relative;
      width: 100vw;
      height: 60vh;
      overflow: hidden;
    }

    #video-background {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    #video-content {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 20px;
      color: white;
      background: rgba(0, 0, 0, 0.5);
      box-sizing: border-box;
    }

    #movie-cards {
      margin-top: 50vh;
      padding: 20px;
    }

    .card {
      margin-bottom: 20px;
      margin-right: 20px;
      max-width: 300px;
      /* Add border-radius for rounded corners */
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    /* Add spacing between cards */
    .card-group {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      /* Adjust as needed */
      margin-bottom: 20px;
    }

    .fade-in-out {
      animation: fadeInOut 1s ease-in-out;
    }

    @keyframes fadeInOut {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    /* Bars transition */
    .bars {
      animation: bars 1s ease-in-out;
    }

    @keyframes bars {
      0% {
        transform: scaleY(0);
      }

      100% {
        transform: scaleY(1);
      }
    }
  </style>
</head>

<body class="main">

  <!-- Navbar -->
  <?php include("navigationbar.php");
  include("../includes/add_movie.inc.php");
  $data = new movies();
  $movies = $data->get_movies();
  ?>

  <!-- Video Background -->
  <div id="video-container">
    <!-- Use the video element with a local path -->
    <video id="video-background" width="100%" height="100%" autoplay muted loop>
      <source src="./video1.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <!-- Video Content -->
    <div id="video-content">
      <h1>Bulk Of Movies to Watch, <br> In Our Beautiful Theatres.</h1>
      <p>The search is over! Let <span style="color: #ff7200;">RK MOVIE THEATRES</span> help you <br> find the perfect movie-theatre experience.</p>
    </div>
  </div>
  <div class="row" style="background: #fff;">
    <div class="col-sm-12 col-lg-6 col-md-6 mt-5" style="padding: 50px;">
      <br>
      <p style="color: black; font-weight: bold;  font-size: 40px;">It has never been easier to <br>watch free movies online.</p>
      <p style="color: black;  font-size: 20px; font-family: 'Times New Roman', Times, serif;">Once you register for a free account with Plex, we will keep your place<br>
        from screen to screen as long as you are signed in. No matter what<br>
        device you choose, your free movies will pick up where you left off<br>
        with ease.</p>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
      <img src="./images/site.jpg" alt="" class="img-fluid">
    </div>
  </div>

  <!-- Latest Movies Section -->
  <div class="" style="background: #fff;">
    <br>
    <h2 style="color: #000; text-align:center;">Playing Soon In Our Theatres</h2>
    <div class="card-group">
      <?php if (!empty($movies)) {

        foreach ($movies as $movie) {
      ?>
          <div class="card" style="width: 18rem;">
            <img src="./images/<?php echo $movie['cover']; ?>" class="card-img-top" alt="Movie 1">
            <div class="card-body">
              <h5 class="card-title">Tittle :  <?php echo strtoupper($movie['movie'])?></h5>
              <!-- <p class="card-text"><?php //echo $movie['movie_description'];?></p> -->
              <a href="#" class="btn" style="background: #ff7200;">Book Now</a>
            </div>
            <div class="card-footer">
              <!-- Rating stars -->
              <div class="rating">
                <?php
                $rating= $movie['rating'];
               for ($i = 1; $i <= $rating; $i++) {
                echo '<span class="fa fa-star checked" style="color:gold;"></span>';
                }
                ?>
                IMDB::<?php 
                echo $movie['rating'];
                ?>
              </div>
            </div>
          </div>

      <?php
        }
      }
      ?> <!-- Add more cards with the same structure -->
    </div>
  </div>

  <!-- Footer -->
  <div id="footer">
    <?php include("footer.php"); ?>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Array of video sources
      var videoSources = ['./video1.mp4', './video2.mp4', './video3.mp4'];

      var videoElement = document.getElementById('video-background');
      var currentVideoIndex = 0;

      // Function to change video source with fade effect
      function changeVideoWithFade() {
        // Apply fade-in-out class for the fade effect
        videoElement.classList.add('fade-in-out');

        setTimeout(function() {
          // Remove the class after the transition
          videoElement.classList.remove('fade-in-out');
          // Change the video source
          videoElement.src = videoSources[currentVideoIndex];
          // Play the new video
          videoElement.play();
        }, 1000); // 1 second, adjust as needed

        // Increment the index for the next video
        currentVideoIndex = (currentVideoIndex + 1) % videoSources.length;
      }

      // Function to change video source with bars effect
      function changeVideoWithBars() {
        // Apply bars class for the bars effect
        videoElement.classList.add('bars');

        setTimeout(function() {
          // Remove the class after the transition
          videoElement.classList.remove('bars');
          // Change the video source
          videoElement.src = videoSources[currentVideoIndex];
          // Play the new video
          videoElement.play();
        }, 1000); // 1 second, adjust as needed

        // Increment the index for the next video
        currentVideoIndex = (currentVideoIndex + 1) % videoSources.length;
      }

      // Play the first video
      videoElement.play();

      /// Change video every 30 seconds with fade effect (adjust the time as needed)
      setInterval(changeVideoWithFade, 30000);



      // Alternatively, you can use the bars effect
      // setInterval(changeVideoWithBars, 10000);
    });
  </script>
</body>

</html>