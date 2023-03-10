<?php
require("config/db.php");

if(isset($_POST['submit'])){
    // Get form data
    $taskname = mysqli_real_escape_string($conn, $_POST['taskname']);
    $taskdesc = mysqli_real_escape_string($conn, $_POST['description']);
    $taskdate = mysqli_real_escape_string($conn,$_POST['date']);
    $taskstatus = mysqli_real_escape_string($conn,$_POST['status']);

    $query = "INSERT INTO tasks(task_name, task_description, task_due_date, task_status) VALUES('$taskname', '$taskdesc', '$taskdate','$taskstatus')";

    if(mysqli_query($conn, $query)){
        header("Location: index.php");
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}


?>


	<div class="container">
		<h2>Add Task</h2>
		<form method="POST">
        <div>
            <label>Task Name</label>
            <input type="text" name="taskname" class="form-control">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div>
            <label>Due date</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div>
            <label>Status</label>
           <select name="status">
           <Option></Option>
            <Option>Incomplete</Option>
            <Option>In Progress</Option>
            <Option>Complete</Option>
        </select>
        </div>
        
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>