<?php
<<<<<<< HEAD

=======
    session_start();
    //$_SESSION['Movie'];
>>>>>>> c22349b48bfd0db510e975536df2346f86dc7df8
    include 'dbCon.php';
    $conn = getDatabaseConnection();
   

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title> MovieNator</title>
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <h1> MovieNator </h1>
        
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<<<<<<< HEAD
                    <a class="navbar-brand" href="index.php">Movie Database</a>
                </div>
=======
>>>>>>> c22349b48bfd0db510e975536df2346f86dc7df8
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="Popularity.php">Popular</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Crime</a></li>
                                <li><a href="#">Thriller</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Fantasy</a></li>
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Science Fiction</a></li>
                                <li><a href="#">Comedy</a></li>
                                <li><a href="#">Drama</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Psychological</a></li>
                                <li><a href="#">Horror</a></li>
                                <li><a href="#">Romance</a></li>
                                <li><a href="#">Mystery</a></li>
                                <li><a href="#">Indie</a></li>
                            </ul>
                        </li>
<<<<<<< HEAD
                        <li><a href="#">Checkout</a></li>
=======
                        <li><a href="checkout.php">Checkout</a></li>
>>>>>>> c22349b48bfd0db510e975536df2346f86dc7df8
                        <li><a href="#">Random</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Length</a></li>
                                <li><a href="#">A-Z</a></li>
                                <li><a href="#">Z-A</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="input-group">
                            <input type="text" name="movieSelect" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-default">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

    <?php
      //$movies = displayMovies(); 
      // foreach($movies as $movies){
      //   echo $movies['movieId']. ' ' .$movies['movieName']. ' ' .$movies['movieGenre']; 
      //   echo "<br>"; 
      // }
    ?>
<<<<<<< HEAD
=======
    <script src="js/javafunctions.js"></script>
>>>>>>> c22349b48bfd0db510e975536df2346f86dc7df8
  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Movie Name</th>
          <th>Genre</th>
          <th>Year</th>
          <th>Info</th>
        </tr>
      </thead>
      <tbody>
      <?php
      displayMovies(); 
      ?>
      </tbody>
      </table>
  </div>
  </body>
</html>