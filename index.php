<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To-Do-List</title>
</head>
<body>
    
<?php
	require('config/db.php');
   

$query="SELECT * FROM tasks";



$result = mysqli_query($conn, $query);

    
$task = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
mysqli_free_result($result);

    
mysqli_close($conn);

?>


<div>
                                    <h4>Tasks</h4>
                                
                                </div>

                                <form action="result.php" method="get">
                                <label>Search: </label>
					<select class="form-control" name="status" >
						<option value="In Progress">In Progress</option>
						<option value="Incomplete">Incomplete</option>
						<option value="Complete">Complete</option>
					</select>
					<button class="btn btn-primary" name="filter">Filter</button>
                    <button type="button" onclick="window.location.href='addtask.php';">Add Task</button>
                                </form>
                               
                             
                                    <table class="customers">
                                        <thead>
                                      
                                            <th>ID</th>
                                            <th>Task Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        
                                        </thead>
                            
                                        <tbody>
                                            <?php foreach($task as $tasks) : ?>
                                            <tr>
                                                <td><?php echo $tasks['id'];?></td>
                                                <td><?php echo $tasks['task_name'];?></td>
                                                <td><?php echo $tasks['task_description'];?></td>
                                                <td><?php echo $tasks['task_due_date'];?></td>
                                                <td><?php echo $tasks['task_status'];?></td>
                                                <td>
                                                    <a href="delete.php?id=<?php echo $tasks['id']; ?>">Delete</a></td>
                                                   <td> 
                                                   <a href="edit.php?id=<?php echo $tasks['id']; ?>">Edit</a></td>
                                            </tr>
                                            <?php endforeach ?>
                                            



                                        </tbody>
                                    </table>
                                    
                                       
                               
                                

</body>
</html>