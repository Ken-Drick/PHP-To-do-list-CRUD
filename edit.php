<?php
require("config/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$tasks = $result->fetch_assoc();


if (isset($_POST['submit'])) {
    $taskname = $_POST['taskname'];
    $taskdesc = $_POST['description'];
    $taskdate = $_POST['date'];
    $taskstatus = $_POST['status'];
    $query = "UPDATE tasks SET task_name='$taskname', task_description='$taskdesc', task_due_date='$taskdate', task_status='$taskstatus' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>




<div class="container">
		<h2>Edit Task</h2>
		<form method="POST">
        <div>
            <label>Task Name</label>
            <input type="text" name="taskname" class="form-control" value="<?php echo $tasks['task_name']; ?>">
        </div>
        <div>
            <label>Description</label>
            <input name="description" class="form-control" size="50" value="<?php echo $tasks['task_description']; ?>">
        </div>
        <div>
            <label>Due date</label>
            <input type="date" name="date" class="form-control"value="<?php echo $tasks['task_due_date']; ?>">
        </div>
        <div>   
            <label>Status</label>
           <select name="status" value="<?php echo $tasks['task_status']; ?>">
           <Option></Option>
            <Option>Incomplete</Option>
            <Option>In Progress</Option>
            <Option>Complete</Option>
        </select>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>