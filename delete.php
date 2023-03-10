<?php

require("config/db.php");

$taskid = $_REQUEST['id'];
            
$query = "DELETE FROM tasks WHERE id = $taskid" ;


if(mysqli_query($conn, $query)){
    header("Location: index.php");
} else {
    echo 'ERROR: '. mysqli_error($conn);
}


?>