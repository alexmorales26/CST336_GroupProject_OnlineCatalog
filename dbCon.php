<?php
    function getDatabaseConnection(){
    
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_5cc899d91ebdb63';
    $username = 'bc84338c545651'; 
    $password = '06d1624f';
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname",$username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn;
    
}

?>