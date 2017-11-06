<?php
    include 'dbCon.php';
    $conn = getDatabaseConnection();
    
    function displayMovies() {
        global $conn;
        $sql = "SELECT * FROM `db_movie`";
                
        $statement = $conn->prepare($sql);
        $statement->execute();
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
        //This will return an array of movie info
        return $movies;
    }
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
                    <a class="navbar-brand" href="#">Movie Database</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Popular</a></li>
                        <li><a href="#">Genre</a></li>
                        <li><a href="#">Checkout</a></li>
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
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default">
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
      $movies = displayMovies(); 
      foreach($movies as $movies){
       echo "<tr>";
          echo"<td>".''.$movies['movieName'].''."</td>"; 
          echo"<td>".''.$movies['movieGenre'].''."</td>"; 
          echo"<td>".''.$movies['movieYear'].''."</td>"; 
          echo"<td>Info</td>"; 
        echo"</tr>"; 
      }
      ?>
      </tbody>
      </table>
  </div>
  </body>
</html>