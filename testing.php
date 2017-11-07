<?php

    include 'dbCon.php';
    $conn = getDatabaseConnection();
    
    function getUsers() {
        global $conn;
        
        $sql = "SELECT * FROM `db_user` WHERE 1 ";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($users as $user) {
            echo "<option>" . $user['firstName'] . " " . $user['lastName'] . "</option>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <form>
            <select name="users">
                <option value="">Users</option>
                <?=getUsers()?>
            </select>
        </form>
        
        
    </body>
</html>