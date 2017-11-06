<?php
session_start();
include'dbCon.php';
    function deleteItem(){
    $conn=getDatabaseConnection("tcp");
    $sql="DELETE FROM db_checkout WHERE checkoutId=".$_GET['checkoutId'];
    
     $stmt=$conn->prepare($sql);
    $stmt->execute();
        
    header("Location:checkout.php");
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
<div class="container">
        <table class="table table-hover">
        <thead>
       <tr>
        <th class="col-xs-3"> Title</th>
        <th class="col-xs-3">Genre</th> 
        <th class="col-xs-3">Duration</th>
        <th class="col-xs-3">Update Cart</th>
        </thead>
        <tbody>
            <tr>
            <td>Jill</td>
            <td>Smith</td> 
            <td>50</td>
            <td>
            <div class="inline">
             <button type="button" class="btn btn-danger  btn-sm btn-block">Remove Item</button>
             </div>
            </td>
          </tr>
      </tr>
      
    </table>
</div>
<script src="js/javaFunctions.js"></script>
    </body>
</html>