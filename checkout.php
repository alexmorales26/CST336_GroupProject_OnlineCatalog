<?php
// Checkout page
session_start();
$movieDisplay= array();
$All = array();
if(isset($_GET['movieId'])){
    $_SESSION['movieId']=$_GET['movieId'];
    $index=$_SESSION['movieId'];
    array_push($movieDisplay,$_SESSION['movieName'][$index],$_SESSION['movieGenre'][$index],$_SESSION['movieYear'][$index]);
    array_push($All,$movieDisplay);
    print_r($All);
}
//print_r($_SESSION);
//print($_SESSION['movieId']);
if(empty($_SESSION)){
    echo"Empty Cart";
}
function refreshCart()
{
    global $All;
  // for( $x=0; $x < count($movieDisplay);$x++){
       foreach((array)$All as $movie){
  // $i = $_SESSION['movieId'];
     echo "<tbody>";
    echo "<tr>";
        echo " <td>".''.$movie[0].''."</td>";
         echo"  <td>".''.$movie[1].''."</td>"; 
        echo    "<td>".''.$movie[2].''."</td>";
          echo " <td>";
   echo " <div class='inline'> ";
    echo"<a href='removeItem.php' class='btn btn-danger  btn-sm btn-block'role='button'>Remove Item</a>";
           echo"  </div>";
        echo    "</td>";
         echo " </tr>";
      echo "</tr>";
       echo "</tbody>";
     //  }
    }
}
   
    
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Checkout Cart</title>
    <style>
        @import url("css/styles.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
    <h1 class="display-4" id="checkOutTitle"> Shopping Cart</h1>
    <hr>
 <nav class="navbar navbar-light">
 <a class="btn btn-success btn-lg" href="index.php" role="button"> Go Back </a>
 <input class="btn btn-primary btn-lg" type="submit" value="Purchase!" id="checkoutBtn">
 
</nav>
<div class="container" id="checkoutCartTable">
        <table class="table table-hover">
        <thead>
       <tr>
        <th class="col-xs-3"> Title</th>
        <th class="col-xs-3">Genre</th> 
        <th class="col-xs-3">User</th>
        <th class="col-xs-3">Update Cart</th>
        </thead>
        <!-- --> 
        <?=refreshCart()?>
    </table>
</div>
<script src="js/javaFunctions.js"></script>
    </body>
</html>