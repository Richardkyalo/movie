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
<div class="row sticky-top">
  <!-- Navbar -->
  <?php 
  session_start();
  include  ("navigationbar.php");
  include("../includes/add_movie.inc.php");
  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("Location: login.php");
    exit();
}
$error="";
if (isset($_GET['error'])) {
  $error = $_GET['error'];
} else {
  $error = "";
}
  $data = new movies();
  $movies = $data->get_movies();

  $data1=new movies;
  $theatres= $data1->get_theatres();

  $recomendation=new movies();
  $recomended_movies=$recomendation->getbookedMovies($email);
  ?>

</div>

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
  <div class="row" style="padding-left: 50px; color:#ff7200;">
  <?php echo $error ?>
  </div>
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
<!--recomendation engine-->

<div class="row" style="background: #fff;">
    <br>
    <?php if (!empty($recomended_movies)) { ?>
    <h2 style="color: #000; text-align:center; font-family: 'Times New Roman', Times, serif;"><u>Some Of The Upcoming And Recommended Movies</u> </h2>
<?php
        $count = 0; // Initialize a counter
        foreach ($recomended_movies as $movie) {
            if ($count % 6 == 0) { // Start a new row for every 3 cards
                echo '<div class="row">';
            }
    ?>
            <div class="col-lg-2 col-md-2 col-sm-12 col-12" >
                <div class="card" >
                    <img src="./images/<?php echo $movie['cover']; ?>" class="card-img-top" alt="Movie 1">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;">Title: <?php echo strtoupper($movie['movie'])?></h5>
                        <form action="moviebooking.php" method="post">
                            <input type="text" name="movie_id" value="<?php echo $movie['movie_id']?>" hidden>
                            <input type="submit" name="submit" value="Book Now" style="background: #ff7200; border-radius:40px;">
                        </form>
                    </div>
                    <div class="card-footer">
                        <!-- Rating stars -->
                        <div class="rating">
                            <?php
$rating = round($movie['rating'] / 2); 
for ($i = 1; $i <= 5; $i++) { 
    if ($i <= $rating) { 
        echo '<span class="fa fa-star checked" style="color:gold;"></span>';
    } else {
        echo '<span class="fa fa-star" style="color:gold;"></span>';
    }
}

                            ?>
                            <br>IMDB: <?php 
                            echo $movie['rating'];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            $count++; // Increment the counter
            if ($count % 6 == 0) { // Close the row after every 3 cards
                echo '</div>';
            }
        }
        if ($count % 6 != 0) { // Close the row if the number of cards is not a multiple of 3
            echo '</div>';
        }
    }
    ?>
</div>


  <!-- Latest Movies Section -->
  <div class="row" style="background: #fff;">
    <br>
    <h2 style="color: #000; text-align:center; font-family: 'Times New Roman', Times, serif;"><u>Playing Soon In Our Theatres</u> </h2>
    <?php if (!empty($movies)) {
        $count = 0; // Initialize a counter
        foreach ($movies as $movie) {
            if ($count % 6 == 0) { // Start a new row for every 3 cards
                echo '<div class="row">';
            }
    ?>
            <div class="col-lg-2 col-md-2 col-sm-12 col-12" >
                <div class="card" >
                    <img src="./images/<?php echo $movie['cover']; ?>" class="card-img-top" alt="Movie 1">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;">Title: <?php echo strtoupper($movie['movie'])?></h5>
                        <form action="moviebooking.php" method="post">
                            <input type="text" name="movie_id" value="<?php echo $movie['movie_id']?>" hidden>
                            <input type="submit" name="submit" value="Book Now" style="background: #ff7200; border-radius:40px;">
                        </form>
                    </div>
                    <div class="card-footer">
                        <!-- Rating stars -->
                        <div class="rating">
                            <?php
$rating = round($movie['rating'] / 2); 
for ($i = 1; $i <= 5; $i++) { 
    if ($i <= $rating) { 
        echo '<span class="fa fa-star checked" style="color:gold;"></span>';
    } else {
        echo '<span class="fa fa-star" style="color:gold;"></span>';
    }
}

                            ?>
                            <br>IMDB: <?php 
                            echo $movie['rating'];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            $count++; // Increment the counter
            if ($count % 6 == 0) { // Close the row after every 3 cards
                echo '</div>';
            }
        }
        if ($count % 6 != 0) { // Close the row if the number of cards is not a multiple of 3
            echo '</div>';
        }
    }
    ?>
</div>



  <div class="row fluid" style="background:#fff;">
    <div class="col-sm-12 col-lg-6 col-md-6 mt-5 px-5">
      <p style="color: black; font-weight: bold;  font-size: 40px; font-family: 'Times New Roman', Times, serif;">See what is new</p>
      <p style="color: black;  font-size: 20px; font-family: 'Times New Roman', Times, serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
      Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris <br>
      nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor <br>
      in reprehenderit in voluptate velit esse cillum dolore eu <br>
      fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, <br>
      sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 mt-5 ">
      <img src="./images/movielogo.jpg" alt="" class="img-fluid">
    </div>
  </div>
  <div class="row" style="background: #fff;">
  <h2 style="color: #000; text-align:center; font-family: 'Times New Roman', Times, serif;"><u>Take a Look on Our Theatres</u></h2>
  <?php 
  if(!empty($theatres)) {
    foreach ($theatres as $theatre) {
  ?>
  <div class="col-lg-6 col-sm-12 col-md-6">
  <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./images/<?php echo $theatre['display']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo  strtoupper($theatre['theatre_name'])." "."THEATRE"?></h5>
        <p class="card-text" style="font-family: 'Times New Roman', Times, serif;"> <span style="color:#ff7200;"><?php echo  strtoupper($theatre['theatre_name']) ?> </span>is located at <?php echo $theatre['county'] ?> County
        , <?php echo $theatre['town'] ?> Town, <?php echo $theatre['streat']?> Street. <br>
       It has a capacity of <?php echo $theatre['seats']?> Seats
      </p>
        <p class="card-text"><small class="text-body-secondary">WELCOME TO <?php echo  strtoupper($theatre['theatre_name']) ?> AND LETS ENJOY TOGETHER</small></p>
      </div>
    </div>
  </div>
</div>
  </div>
  <?php
    }
  }
  ?>
  </div>

  <!-- Footer -->
  <div id="footer" class="row">
    <?php include("footer.php"); ?>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src=."/js/bootstrap.bundle.js"></script>
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